# JsonReducer

## What is it
An array size reducer (for JSON output purposes) into array of Eloquent Models (PHP).

It's basically an implementation of following:
[Smaller Serialized Data](http://www.youtube.com/watch?v=qBxeHkvJoOQ)
### Input example (Eloquent Model Array Visualization)
```javascript
{
 "data": {
		{
			"id": 1,
			"name": "Jesús Emanuel",
			"lastname": "Lozano Maltos"
		},
		{
			"id": 2,
			"name": "Gilberto",
			"lastname": "Reyes Barrera"
		}
  }
}
```
### Output example (Array Visualization)
```javascript
{
 "data": {
		{
			"id":[1, 2],
			"name": ["Jesús Emanuel", "Gilberto"],
			"lastname": ["Lozano Maltos", "Reyes Barrera"]
		}
  }
}
```
### Example usage (laravel)
```php
public function index()
{
	$users = User::all();
	return response()->json(JsonReducer::reduce($users));
}
```