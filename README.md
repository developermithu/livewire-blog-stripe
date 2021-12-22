<!-- alt+m  for snippets -->

Start `php artisan queue:work`

### Models

1. User
1. Profile `(user_id)`
1. Post
1. Tag `(Polymorphic relation with Post)` (taggables database)
1. Comment `(Polymorphic relation with Post)`
1. Setting
1. Plan

### Seeder

1. UserSeeder
1. PlanSeeder
1. TagSeeder
1. CommentSeeder

### Policy & Register `(AuthServiceProvider)`

1. UserPolicy
1. PostPolicy
1. CommentPolicy
1. TagPolicy

### Traits

1. ModelHelpers
1. HasAuthor
1. HasTags
1. HasComments
1. HasCommentable
1. HasReplies

### Contracts

1. CommentAble

### Casts

1. TitleCast
1. PriceCast

### Providers

CustomBladeServiceProvider
### Services

SaveImageService

### Observer 
`Observer take a lots of time to seed & crud data. Comment observer at the time of seeding.`

TagObserver (register it in EventServiceProvider boot method)
PostObserver (register it in EventServiceProvider boot method)

### Responses

LoginResponse

### Jobs
CreatePost
CreateTag
CreateComment

### Middleware

IsAdmin

### Laravel Cashier Setup

```
composer require laravel/cashier
php artisan migrate
php artisan vendor:publish --tag="cashier-migrations" (created three tables in db)
use Billable (In User Model)
```
