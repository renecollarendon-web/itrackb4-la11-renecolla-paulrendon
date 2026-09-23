ITRACKB4 - Laboratory Activity 6: Two Filters, One Route

Q1: Why was no new route needed when adding a second filter?
The router only looks at the path of a URL, not the query string.  When I visit `/movies` and `/movies?genre=Romance`, the router sees the same path for both — which is just `/movies`. The `?genre=Romance` part is a query string, and the router ignores it completely. Because 
of this, one route can handle all four URLs without needing a new one.

Q2: What would the URL look like if both filters were route parameters?
If both filters were route parameters, the URL for "year 4 only, no course filter" would have to be something like `/movies/filter/4`. But this creates a problem — there is no way to skip the course parameter and go straight to the year. To make it work, I would need to put a placeholder value for the course, like `/movies/filter/all/4`. This shows why route parameters are bad for optional filters, you cannot leave one out without breaking the URL structure. Query strings are much better because you can simply leave out the key you don't need.

Q3: Which navigation case needed a change to the pattern, and why?
The detail page case needed a change to the pattern because the URL `/movies/3` has a longer path than just `/movies`. To keep the link marked, I had to add a wildcard (`*`) to the pattern, making it `movies*`. The filter case did not need any change because `/movies genre=Romance` has the exact same path as `/movies`, the query string is not part of the path. Since `request()->is()` only checks the path, the filter case worked automatically.

Q4: Why delete the old filter method but keep the empty store and update methods?
The old filter method was deleted because it has been replaced by a better implementation using query strings. Nothing will ever point to it again, so leaving it in the project would mean having two filter implementations, one of them dead code. The empty store and update  methods are different because they are not finished yet. They will be filled in during Weeks 7 and 10, so they stay in the controller as a reminder of work that is still to come. The rule is simple: keep code that is not finished yet, delete code that has been replaced.