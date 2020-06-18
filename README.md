<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Us (Developers)

This project was made for COMP6343 Web Application Development and Security Class project. 
Group members (L4AC/Group 8):

- Muchsin Hisyam - 2201797430 [(Github)](https://github.com/muchsinhisyam)
- Naman Vohra - 2201798420 [(Github)](https://github.com/namanv19)

## About This Project (CustomNiture)
CustomNiture is a web app which allows you to customize your own furniture according to your taste and have it delivered to your resident.

CustomNiture Website: [(http://customniture.me/)](http://customniture.me/)

For the Front-end we used Laravel Blade Framework, and the Back-end we used Laravel. Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Installation (Package)
- We used LaravelDaily/laravel-invoices package for the invoice generate process. For the details about the package, you can click [here.](https://github.com/LaravelDaily/laravel-invoices)

- First install LaravelDaily/laravel-invoices package with this command.

		$ composer require laraveldaily/laravel-invoices
        
- After installing LaravelDaily/laravel-invoices package, run this command.

		$ php artisan invoices:install

## Features

- Simple E-commerce UI Design.
- Easier Transactions.
- Custom Furniture Order Available.
- Users can download/generate Order's Invoice.
- Admin Functionality.
- Products Managements.
- Orders Managements.
- Users Managements.
- Admin can download User's payment photos from their orders.
- Admin can download User's custom order photos / illustration from the form that they have submitted.

## Step-by-Step to Purchasing a Furniture / Stock Order

1. Firstly, log in into the website. If you don't have an account, you can create one by clicking 'Create an account' button'.
2. Next, click the 'PRODUCTS' button on the sidebar.
3. Users can choose the type of furniture (like tables, chairs, etc) from Categories. Users can either click the small cart symbol located beside each product's name or click the product name to look at its details first. If the customer clicks the cart symbol on the products page (not product details), one quantity of the corresponding product will be added to user's cart. Otherwise, the user can select the quantity of the chosen product to be added to the cart on the product details page.
4. The user can also update the cart if they goes to cart page by clicking "CART" button on the sidebar. This is the same page where the user can checkout. If the customer clicks the checkout button, they will have to check/fill  the details such as address, city, zip code, etc. The user may also update the details. After checking the form details, the customer can click the checkout button located on the same page.
5. The customer can check the order status by visiting the orders page. This page can be visited by clicking the 'ORDERS' button on the sidebar. Apart from checking the status, the client can view their transaction history.
6. Next, the client can view the order details of a particular order by clicking the 'View Details button'. Here, the total price of ordered products and the shipping details are displayed. Lastly, the order's invoice can be generated if the order status is ''Payment is on verification" or means that the user already pay the order and upload payment photo. It means that the order has been verified by the admin. 
8. Once the order finished, the order will be sent to your resident.

## Step-by-Step to Purchasing a Custom Furniture / Custom Order

1. Click "Custom Order" button on the web footer.
2. Make sure you have an account because you'll need to login first, otherwise you need to create an account first.
3. Fill the custom order form. (Please give us correct info about your personal data (eg. Name, Phone no, etc). and specify your custom furniture that you want to order by fillin the details on the description box, and upload some photos for the blueprint or custom furniture illustration).
4. Once your done submit the form, you'll be directed to the Orders page.
5. Wait for our confirmation, we'll contact you from your phone number for asking your custom order details and illustration.
6. Once we get your custom order illustrations, we give the price and invoice of the custom order.
5. The customer can check the order status by visiting the orders page. This page can be visited by clicking the 'ORDERS' button on the sidebar. Apart from checking the status, the client can view their transaction history.
7. If the order status is 'Waiting for Payment' the customer must pay the custom order, afterwards the custom order will be processed.
8. Once the order finished, the custom order will be sent to your resident.

## Admin Controls / Privileges
- Products Managements.
- Orders Managements.
- Users Managements.
- Download User's payment photos from their orders.
- Download User's custom order photos / illustration from the form that they have submitted.

## Step-by-Step to Create/Show/Update/Delete Products

1. Login to the web with admin users.
2. Click 'Products' on the sidebar and choose 'Create Products', and fill the product form (filling the product details and upload product photos), Make sure the  category and colors datas is already added before creating a new products, otherwise the form dropdown data on the 'Color' and 'Category' is empty/not shown.
3. Once new product added, the web will direct you to the view all products page.
4. If you want to delete or update product's data, you can click 'Delete' or 'Edit' button on the 'Action' column.
5. If you want to show all products data, click 'Products' on the sidebar and choose 'View All Products'.

## Step-by-Step to Create/Show/Update/Delete Users or Users Info

1. Login to the web with admin users.
2. Click 'Users' on the sidebar and choose 'Create User', and fill the user form.
3. Once new user added, the web will direct you to the view all users page.
4. If you want to delete or update user's data, you can click 'Delete' or 'Edit' button on the 'Action' column.
5. If you want to show all users data, click 'Users' on the sidebar and choose 'View All Users'.
6. Once the new user is created/registered, the User's Info data will be created but its still null, in order to fill the User's Info, the customer need to fill their info details when ordering some orders or Admin can edit or delete it from 'Delete' or 'Edit' button on the 'Action' column at 'View All User's Info'.

## Step-by-Step to Show/Delete Orders (Stock Orders/Custom Orders) and Download Their Payment Photos/Custom Order Photos

1. Login to the web with admin users.
2. If you want to show all user's orders data, click 'Orders' on the sidebar and choose what type of order you want to see (Stock Orders or Custom Orders).
3. If you want to download the custom photos, you need to open it specifically on the 'Orders' on the sidebar and choose 'View All Custom Orders'. Then click 'Download Custom Photos' on the 'Action' column on specific order column that you want to download.
4. If you want to download the payment photos, click 'Orders' on the sidebar and choose what type of order you want to see (Stock Orders or Custom Orders). Then click 'Download Payment Photos' on the 'Action' column on specific order column that you want to download.

## Website Design

###- Database Design
<p align="center"><img src="https://cdn.discordapp.com/attachments/685719106065924136/723053510614188043/unknown.png"></p>

### - Homepage Design
- Template Name: Amado
- Template URL: https://colorlib.com/wp/template/amado/
- Author: Colorlib.com

### - Admin Page Design
- Template Name: SB Admin 2
- Template URL: https://startbootstrap.com/themes/sb-admin-2/
- Author: Startbootstrap.com

All rights reserved to their respective owners.
