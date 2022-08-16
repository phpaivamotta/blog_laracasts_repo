# About blog_laracasts_repo

This repo was initially created as I was following along with Laracasts' Laravel 8 From Scratch tutorial (at www.laracasts.com).
After the series was done, I decided to keep working on the project. The project has now turned into a full-on website being operated by my partner, Jessica Szklarz, who already used the medium platform as a blog, but did not have an exclusive website yet. You can visit the website at https://www.polianaporcelana.com.

Although this project got staterted with the Laracasts' tutorial, I have added many of my own features to it, as I further describe below.

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

I feel like it is a bit of a shame that most of the features I have implemented on my own are features only the admin can use, such as seeing who liked and commented on a post, or how many views the post got, or even being able to delete a comment. Because of that, below are some screenshots of the admin view, so that you can have a peek at the features implemented. It should be noted that the site is in Portuguese because my partner's blog is written in Portuguese and focused on a Brazilian audience, so the text in the screenshots you are about to see are in Portuguese. 

#### Admin posts dashboard
![image](https://user-images.githubusercontent.com/29764933/184685144-c4dc647a-a6e7-428e-ae12-46a9c1822ba0.png)
Note: the eye icon represents the number of unique ip adresses that have visited the post, which was also a feature implemented by me after the tutorial.

#### Admin posts dashboard confirm delete post modal
![image](https://user-images.githubusercontent.com/29764933/184685349-7540710f-b603-45f7-ba9c-b477afccfdf0.png)

#### Admin posts dashboard confirm hide post modal
![image](https://user-images.githubusercontent.com/29764933/184685483-b386105a-f6f8-4be9-a6fd-74b77624cc08.png)

#### Admin posts dashboard see who commented on post
<img width="925" alt="image" src="https://user-images.githubusercontent.com/29764933/184686572-f51235d8-a531-4a93-9f72-b9a250256a4a.png">

#### Admin posts dashboard see who liked post
<img width="902" alt="image" src="https://user-images.githubusercontent.com/29764933/184686879-cafa5897-4fbe-4d47-ab19-a58c753c05f7.png">

#### Admin users dashboard
![image](https://user-images.githubusercontent.com/29764933/184686076-f7ea17dc-8d24-4282-a811-f341f94ad381.png)

#### Admin users dashboard confirm delete user modal
![image](https://user-images.githubusercontent.com/29764933/184686294-3c9282e1-ec61-41d6-8c54-41843a0d4b9e.png)

#### Admin users dashboard see which posts user commented on
<img width="932" alt="image" src="https://user-images.githubusercontent.com/29764933/184687108-8ebb53ff-1536-4b3b-9035-2a1f4af4117a.png">

#### Admin users dashboard see which posts user liked
<img width="934" alt="image" src="https://user-images.githubusercontent.com/29764933/184687216-9820c203-45b4-4c81-9751-bb80e0aa1b7b.png">

#### Admin delete comment option
![image](https://user-images.githubusercontent.com/29764933/184688439-d7a4aad8-7c06-4872-b429-410254a78a4f.png)

#### Admin confirm delete comment modal
![image](https://user-images.githubusercontent.com/29764933/184688511-8182e94c-a018-4ebe-af34-2a01c2f57243.png)

#### Admin create new post
![image](https://user-images.githubusercontent.com/29764933/184690405-e9d213be-60b5-4113-8811-4fcedc0ddc07.png)
Note: the ckeditor text area for the body of the post at the bottom of the form 

These are some of the features only the admin gets to use. Although there are other admin featurs, they were already implemented in the Laracasts' tutorial. All other features can be seen by any user who creates an account.

## What I wish to change/add

*   Picture uploads
    + Instead of resizing it with css, cropping it at upload, to avoid deformed images
* Ckeditor
    + Working with ckeditor was difficult. The styles ckeditor uses conflicted with tailwind's styles, which required a lot of debugging and manual adjustments.
    + I could not translate the editor itself, though I followed the documentation.
    + The text formatting displayed inside the editor is not consistent with what will be displayed when the text is posted (probably due to ckeditor style conflicts and how the editor treats &nbsp).
* The ability to like a comment
* The ability to comment on a comment
* A notification alert system for both admin and users

## Final thoughts

This has been a great project to work on! I've learned a lot! From the basics of working with Laravel, to deploying and updating my own project! Now, do I think this website that can substitute my partner's Medium posts? No. Do I think my website is going to be popular? Absolutely not. But is it a good first project? Hell yes! I've gone beyond the completion of the course and implemented new features and deployed it to the web. I think this is a good start. Now, I hope to keep building! 





