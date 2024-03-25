# Pomodoro Test Application for Rebuy

## Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Packages and Software Used

- [Local environment is Docker, WSL2 and using Laravel Sail](https://laravel.com/docs/11.x/installation#sail-on-windows)
- [Laravel Jetstream Inertia with Teams](https://jetstream.laravel.com/introduction.html)
- [Laravel Pulse for server information](https://laravel.com/docs/11.x/pulse)
- [Laravel Reverb for Websocket server](https://laravel.com/docs/11.x/reverb)
- [Postman for API calls](https://www.postman.com/)
- [Postman Workspace with endpoints](undefined/workspace/pomodoro-test/collection/594104-ad936617-5368-4337-b106-ce1635a387ee?action=share&creator=594104)

## Security Concerns and suggested updates

As this is a test for a job opportunity and as such is a MVP product. Here is a list of bullet point for discussion

- Web hooks ofr api web socket broadcasting
- Better security with api keys
- Clean up controllers as now they are "fat" and the models are "skinny"
- Better test coverage even though there are PHPunit feature tests.
- Better queries and more refined for performance and security
- Documentation (Almost none right now)
  
## Install Instructions

Created locally using Laravel Sail on a Windows 11 machine with WSL2 (Ubuntu 20.04 LTS) [Sail](https://laravel.com/docs/11.x/installation#sail-on-windows).

1. Clone repo locally and cd into the directory 'pomodoro'. 
2. Run ```sail up -d``` this will take a few minutes as it download the required docker packages and sets up your environment
3. Once everything is "started" open your browser and register an account. After you see the dashboard you can click by your avatar in the upper right. You will see a drop down and click API
4. Create your api key and give it all the crud permissions
5. Using Postman and the workspace linked above, set up an environment with the APi token as a variable
6. Using that environment and the workspace linked above you will be able to use the api endpoints
