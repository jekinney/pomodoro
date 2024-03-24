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

## Packages Used

- [Laravel Jetstream Inertia with Teams](https://jetstream.laravel.com/introduction.html)



## Security Concerns

As this is a test for a job opportunity and as such is a MVP product. 

- Using the Jetstream default views to register an account and able to get a token for api requests. Might have better options such as secret and public keys, etc.
- Team access (ACL) should be more specific with finer control of access. Right now there are possible loop holes with team members having to much access. Possible use of a role and permissions ACL.
- Use UUID's instead of the default integer as primary keys. Using an integer can help people guess and hit your security harder to find loop holes for access

## Updates and refactor suggestions

1. This was built using TDD but coverage is limited and not all scenarios are covered. This could lead to inaccurate positive test. If using this could I would strongly suggest verify test coverage to meet your requirements and expectations.
2. I would also create a more robust UI to cover all the api endpoints and a web based ui so users won't need to use the API endpoints. 
3. Add in better security with some of the suggestions above.
4. Scheduling features for recurring meetings such as once a week for 3 months, every weekday, etc. 
