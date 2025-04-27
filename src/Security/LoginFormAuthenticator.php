<?php

namespace App\Security;

use App\Entity\User;
use App\Entity\UserRole;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_log_in';
    public const LOGIN_PATH ='/login';

    public function __construct(
        private EntityManagerInterface $entityManager,
        private UrlGeneratorInterface $urlGenerator
    ) {
    }

    public function supports(Request $request): bool
    {
        // Check if this is a POST request to the login route
        $currentPath = rtrim($request->getPathInfo(), '/');
        $loginPath = rtrim(self::LOGIN_PATH, '/');

        error_log('Login path: ' . $loginPath);
        error_log('Current path: ' . $currentPath);
        error_log('Request method: ' . $request->getMethod());
        error_log('Request URI: ' . $request->getRequestUri());
        error_log('Request attributes: ' . print_r($request->attributes->all(), true));

        return $request->isMethod('POST') && $currentPath === $loginPath;
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $csrfToken = $request->request->get('_csrf_token');

        if (null === $email || null === $password) {
            throw new BadCredentialsException('Email or password is missing');
        }

        // Debug information
        error_log('Authentication attempt for email: ' . $email);
        error_log('Password length: ' . strlen($password));

        // Check if user exists
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        if (!$user) {
            error_log('User not found for email: ' . $email);
            throw new CustomUserMessageAuthenticationException('No account found with this email.');
        }

        error_log('User found: ' . $user->getEmail());
        error_log('User password length: ' . strlen($user->getPassword()));
        error_log('User role: ' . implode(', ', $user->getRoles()));
        error_log('User active: ' . ($user->isActive() ? 'true' : 'false'));



        // Check if user is active
        if (!$user->isActive()) {
            error_log('User account is not active: ' . $email);
            throw new CustomUserMessageAuthenticationException('Your account is not active.');
        }

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($password),
            [
                new CsrfTokenBadge('authenticate', $csrfToken),
                new RememberMeBadge()
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // Get the user from the token
        $user = $token->getUser();

        // Check the user's role and redirect accordingly
        if ($user instanceof User) {
            $roles = $user->getRoles();

            if (in_array('ROLE_ADMIN', $roles)) {
                return new RedirectResponse($this->urlGenerator->generate('app_admin_dashboard'));
            } elseif (in_array('ROLE_ORGANIZER', $roles)) {
                return new RedirectResponse($this->urlGenerator->generate('app_front_office'));
            } elseif (in_array('ROLE_PLAYER', $roles)) {
                return new RedirectResponse($this->urlGenerator->generate('app_front_office'));
            } else {
                return new RedirectResponse($this->urlGenerator->generate('app_front_office'));
            }
        }

        return new RedirectResponse($this->urlGenerator->generate('app_log_in'));
    }
    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}