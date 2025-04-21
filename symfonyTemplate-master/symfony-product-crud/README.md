# Symfony Product CRUD Application

This project is a Symfony-based CRUD application for managing products. It allows users to create, read, update, and delete product entries, as well as view statistics related to the products.

## Project Structure

The project is organized as follows:

```
symfony-product-crud
├── src
│   ├── Controller
│   │   ├── AdminDashboradController.php
│   │   └── ProductController.php
│   ├── Entity
│   │   ├── Product.php
│   │   └── Panier.php
│   ├── Form
│   │   └── ProductType.php
│   ├── Repository
│   │   └── ProductRepository.php
│   └── templates
│       ├── admin_dashborad
│       │   └── dashboard.html.twig
│       └── product
│           ├── index.html.twig
│           ├── new.html.twig
│           ├── edit.html.twig
│           ├── show.html.twig
│           └── statistics.html.twig
├── public
│   ├── assets
│   │   ├── css
│   │   │   └── soft-ui-dashboard.css
│   │   ├── images
│   │   └── js
│   │       └── soft-ui-dashboard.min.js
├── config
│   └── routes
│       └── annotations.yaml
├── migrations
├── var
├── vendor
├── .env
├── composer.json
├── composer.lock
├── symfony.lock
└── README.md
```

## Features

- **Product Management**: Create, read, update, and delete products.
- **Statistics**: View product statistics in a visually appealing format.
- **Responsive Design**: The application is styled to match a modern dashboard layout.

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   cd symfony-product-crud
   ```

2. Install dependencies:
   ```
   composer install
   ```

3. Set up your database in the `.env` file.

4. Run migrations:
   ```
   php bin/console doctrine:migrations:migrate
   ```

5. Start the server:
   ```
   symfony server:start
   ```

6. Access the application at `http://localhost:8000`.

## Usage

- Navigate to `/admin/dashborad` to access the admin dashboard.
- Use the product management section to add, edit, or delete products.
- View product statistics by navigating to the statistics page.

## Contributing

Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.