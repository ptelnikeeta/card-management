## Steps to initial setup

- Clone Repo
    ```bash
    git clone git@github.com:ptelnikeeta/card-management.git
    ```
- Switch to project
    ```bash
    cd card-management
    ```
- Get vendors
    ```bash
    composer update
    ```
- Setup virtual host
    ```url
    http://local.card-management.com/
    ```
- DB creation
    ```mysql
    CREATE DATABASE IF NOT EXISTS `card-management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
    USE `card-management`;
    ```
- DB migration
    ```bash
    php artisan migrate
    ```
- Change Storage permissions
    ```bash
    sudo chown -R $USER:www-data storage
    sudo chown -R $USER:www-data bootstrap/cache
    
    chmod -R 775 storage
    chmod -R 775 bootstrap/cache
    ```
- Generate storage link
    ```bash
    php artisan storage:link

    ```
- Clear Config Cache
    ```bash
    php artisan config:cache
    php artisan route:clear
    php artisan view:clear
    php artisan cache:clear
    php artisan optimize:clear
    ```
    
## Demo Screens

- Create

    ![Create](https://github.com/ptelnikeeta/card-management/blob/master/public/readme-images/screenshot-local.card-management.com-create.png)
- List

    ![List](https://github.com/ptelnikeeta/card-management/blob/master/public/readme-images/screenshot-local.card-management.com-list.png)

- View

    ![View](https://github.com/ptelnikeeta/card-management/blob/master/public/readme-images/screenshot-local.card-management.com-view.png)
- Edit

    ![Edit](https://github.com/ptelnikeeta/card-management/blob/master/public/readme-images/screenshot-local.card-management.com-edit.png)
