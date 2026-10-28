ITRACKB4 - LA11

G1: Route model binding needs two things to be true. Name both, and say what happens when only one of them is.

The parameter must be type-hinted with the model class, and the parameter name must exactly match the route segment (example; $movie for {movie}). If the name is wrong, Laravel does not know which variable to bind, and you get an empty model or an error. If the type-hint is missing, it just passes the raw ID string.

G2: Your Delete link gave a 404 even though the address was correct. Explain why.

An <a> tag can only send a GET request, but the destroy route expects a DELETE request. The 404 happened because there was no route matching a GET request at that specific address. A form with @method('DELETE') is needed to send the correct verb.

G3: old() takes a second argument on your edit form. What would break if you left it out, and what would break if you used only it?

If I left out the second argument, the form would be blank on the first load because there is no old data yet. If I used only the second argument (without old()), my typed values would disappear after a failed submission, and the original record values would show up instead.

