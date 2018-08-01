<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet"  href= "<?= base_url() . 'assets/css/style.css' ?> ">
    <title><?= $title ?></title>
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
    <a href="<?= base_url() . 'home' ?>" class="navbar-brand"> CILearn</a>

    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="<?= base_url() . 'about' ?>" class="nav-link"> About</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url() . 'contact' ?>" class="nav-link"> Contact</a>
        </li>

        <li class="nav-item">
            <a href="<?= base_url() . 'posts' ?>" class="nav-link"> Posts</a>
        </li>

        <li class="nav-item">
                <a href="<?= base_url() . 'tags' ?>" class="nav-link"> Tags</a>
            </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <?php if ($this->session->logged_in) : ?>

         <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $this->session->name ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <a href="<?= base_url() . 'posts/create' ?>" class="dropdown-item"> Create Post</a>
          <a href="<?= base_url() . 'tags/create' ?>" class="dropdown-item"> Create Tag</a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url() . 'users/logout' ?>" class="dropdown-item"> Logout <i class="fas fa-sign-out-alt"></i> </a>
          
        </div>

        <?php else : ?>
         <li class="nav-item">
            <a href="<?= base_url() . 'users/login' ?>" class="nav-link"> Login</a>
        </li>

          <li class="nav-item">
            <a href="<?= base_url() . 'users/register' ?>" class="nav-link"> Register</a>
            </li>
            <?php  endif ; ?>
    
    </ul>
</nav>
<div class="container">

<?php if( $this->session->flashdata('user_registered') ) : ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('user_registered') ?>
    </div>
<?php endif ; ?>


<?php if( $this->session->flashdata('post_created') ) : ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('post_created') ?>
    </div>
<?php endif ; ?>

<?php if( $this->session->flashdata('post_deleted') ) : ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('post_deleted') ?>
    </div>
<?php endif ; ?>

<?php if( $this->session->flashdata('post_updated') ) : ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('post_updated') ?>
    </div>
<?php endif ; ?>

<?php if( $this->session->flashdata('tag_created') ) : ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('tag_created') ?>
    </div>
<?php endif ; ?>

<?php if( $this->session->flashdata('login_success') ) : ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('login_success') ?>
    </div>
<?php endif ; ?>

<?php if( $this->session->flashdata('login_failed') ) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $this->session->flashdata('login_failed') ?>
    </div>
<?php endif ; ?>

<?php if( $this->session->flashdata('logout') ) : ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('logout') ?>
    </div>
<?php endif ; ?>





    
