<!-- alt+m  for snippets -->

### Models

1. User
1. Profile `(user_id)`
1. Post
1. Tag `(Polymorphic relation with Post)` (taggables database)
1. Comment `(Polymorphic relation with Post)`
1. Setting
1. Plan

### Policy & Register `(AuthServiceProvider)`

1. UserPolicy
1. PostPolicy
1. CommentPolicy

### Traits

1. ModelHelpers
1. HasAuthor
1. HasTags
1. HasComments

### Contracts

1. CommentAble
