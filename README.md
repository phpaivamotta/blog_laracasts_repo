# About blog_laracasts_repo

This repo was initially created as I was following along with Laracasts' Laravel 8 From Scratch tutorial (at www.laracasts.com).
After the series was done, I decided to keep working on the project. The project has now turned into a full-on website being operated by my partner, Jessica Szklarz, who already used the medium platform as a blog, but did not have an exclusive website yet. You can visit the website at https://www.polianaporcelana.com.

## Pages

The website has 14 pages:

1. landing
2. individual post
3. about the author
4. register
5. login
6. forgot password
7. reset password
8. user profile
9. user edit profile
10. admin posts dashboard
11. admin users dashboard
12. admin create new post
13. admin edit post
14. admin edit about section

## Features

The website is a simple blog, where the users can read the blog posts, like or comment on the posts, search for posts and keywords, and subscribe to newsletters. 

Although this project was created by following the Laracasts tutorial, I have since added several pages and functionalities of my own. For instance, pages 3, 6, 7, 8, 9, 11, and 14 did not exist in the original Laracasts project. I have also added extra functionalities, such as: the user being able to like a post, the user being able to share a post on social media (LinkedIn, Whatsapp, Facebook, and Twitter), the admin being able to delete the users and/or the user's comments, the admin being able to hide a post from the main posts index view, the admin being able check who liked and commented on a certain post or which posts a user liked or commented on, the admin being able to see how many unique views a post got (this was done by tracking the users ip address, but the website is also connected to Google Analytics for further insights). Moreover, I have added modals for all deletion tasks and for the hiding of posts task. I have implemented the modal feature with the help of Livewire and Alpine.js. I have also used Livewire to validate all forms in real time and to provide loading indicators and instant image display when appropriate (such as in profile picture upload or post thumbnail upload). I've also used Livewire to instantly update the likes and comments in the post view page. I should also note that the original project was not mobile friendly, and I had to adapt it to mobile, which took quite a bit more work than I expected...

## Stacks

The website runs on a DigitalOcean Laravel droplet. This droplet uses a LEMP stack by default.

The TALL stack (Tailwindcss, Alpine.js, Laravel, and Livewire) was used for the development of this application.

## What you don't see

I feel like it is a bit of a shame that most of the features I have implemented on my own are features only the admin can use, such as seeing who liked and commented on a post, or how many views the post got, or even being able to delete a comment. Because of that, below are some screenshots of the admin view, so that you can have a peek at the features implemented. It should be noted that I had to translate the site to Portuguese because my partner's blog is written in Portuguese and focused on a Brazilian audience, so the text in the screenshots you are about to see was translated by Google Translate from Portuguese to English. 

#### Admin posts dashboard
![image](https://user-images.githubusercontent.com/29764933/184462753-681c5cb8-9e14-441d-afd9-8ea004a02e0a.png)
Note: "To Edit" should have instead simply been "Edit".

#### Admin posts dashboard delete modal
![image](https://user-images.githubusercontent.com/29764933/184433101-51226828-ae36-4f25-bec8-7321cb4c1408.png)
Note: Again, please excuse the poor translation, it was supposed to say "Are you sure?" instead of "He is sure?".


