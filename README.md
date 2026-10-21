ITRACKB4 - LA10

1: Which column did you turn into a table, and why that one and not another?
I turned the genre column into a separate genres table because it is drawn from a fixed list and the same values repeat across many movies. Unlike year or rating, a genre is a real entity that could one day need its own details, like a description or a category.

G2: What number did screenshot 6 show, and why exactly that number?
Screenshot 6 showed 7 queries. There was 1 query to fetch all the movies, plus 1 extra query for each of the 6 movies to fetch its genre, which adds up to 7. After adding with('genre'), it dropped to 2 queries.

G3: Your belongsTo method is named in the singular. What would break if you made it plural?
If I made the method plural (genres()), Eloquent would look for a column named genres_id in the movies table instead of genre_id. Since that column does not exist, the relationship would fail and the page would show an error or blank data.