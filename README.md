# ITRACKB4 - Laboratory Activity 3
## Movie List Application

Author:Paul Rendon B. Renecolla
Course: ITRACKB4
Date: September 2 2026


## Reflection Questions

### Q1:

I put the featured route (`/movies/featured`) above the detail route 
(`/movies/{id}`) because Laravel read the routes starting from the top to bottom. If I swapped them, the detail route would see 
`/movies/featured` and think that "featured" is an ID number, then try to 
find a movie with that ID. Since there is no movie with ID "featured", 
it would show a 404 error page. By putting the featured route first, 
Laravel finds the exact match before trying to treat it as an ID.

### Q2: 

When someone types a wrong ID like `/movies/999`, my code uses `isset()` 
to check if that ID exists in my movie list. If it doesn't exist, I use 
`abort(404)` which show a proper "Page Not Found" error page instead of 
showing ugly PHP error messages with file paths. This keeps my site 
looking professional and safe from hackers who might use error messages 
to find weaknesses.

### Q3: 

I use route names like `route('movies.index')` instead of typing the URL 
like `/movies` because it's safer if I change the URL later. For example, 
if I change `/movies` to `/films` in my routes file, all my links using 
`route('movies.index')` will automatically work with the new address. If 
I had typed `/movies` directly in my HTML, every link would break and 
show 404 errors when I change the URL.

---

## Author

Paul Rendon B. Renecolla - ITRACKB4

## Date

September 3 2026