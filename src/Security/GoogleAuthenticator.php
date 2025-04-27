<?php

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use League\OAuth2\Client\Provider\GoogleUser;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Core\User\UserInterface;

class GoogleAuthenticator extends AbstractAuthenticator
{
    private ClientRegistry $clientRegistry;
    private EntityManagerInterface $entityManager;
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(ClientRegistry $clientRegistry, EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator)
    {
        $this->clientRegistry = $clientRegistry;
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
    }

    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'connect_google_check';
    }

    public function authenticate(Request $request): Passport
    {
        $client = $this->clientRegistry->getClient('google');
        $accessToken = $client->getAccessToken();
        $googleUser = $client->fetchUserFromToken($accessToken);
        $googleData = $googleUser->toArray(); // This gives us the profile picture URL

        /** @var GoogleUser $googleUser */
        $email = $googleUser->getEmail();

        return new SelfValidatingPassport(
            new UserBadge($email, function (string $userIdentifier) use ($googleUser, $googleData) {
                $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $userIdentifier]);

                if ($existingUser) {
                    return $existingUser;
                }

                $user = new User();
                $user->setEmail($googleUser->getEmail());
                $user->setFirstname($googleUser->getFirstName() ?? '');
                $user->setLastname($googleUser->getLastName() ?? '');
                $user->setRole('player');
                $user->setIsActive(true);
                $user->setCreatedat(new \DateTime());
                $user->setUpdatedat(new \DateTime());
                $user->setPassword('');
                $user->setResetCode('');
                $user->setResetCodeExpiry(new \DateTime());
                $user->setDateofbirth(new \DateTime('2000-01-01')); // Use default to avoid null error

                // DOWNLOAD AND SAVE PROFILE PICTURE
                $profilePictureUrl = $googleUser->getAvatar();
                if ($profilePictureUrl) {
                    $imageContents = file_get_contents($profilePictureUrl);
                    if ($imageContents !== false) {
                        $imageName = md5(uniqid()) . '.png';
                        $imagePath = __DIR__ . '/../../public/uploads/profile/' . $imageName;

                        file_put_contents($imagePath, $imageContents);

                        $user->setProfilepicture($imageName);
                    }
                }


                $this->entityManager->persist($user);
                $this->entityManager->flush();

                return $user;
            }),
            [new RememberMeBadge()]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?RedirectResponse
    {
        return new RedirectResponse($this->urlGenerator->generate('app_front_office'));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?RedirectResponse
    {
        return new RedirectResponse($this->urlGenerator->generate('app_log_in'));
    }
}
