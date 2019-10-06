
# Mars Rover Challenge TODO:

### Set up the conditions:

- Query the user for an input
- Parse and Validate the input
- Line 1: must be two integers (x, y) (Map)
- Line 2: must be two integers and a direction(x, y, direction)
- Line 3: must be a string of move"ments("L", "R", "M") eg. "LMLMLMLMM

### Manage the movements:

- Create a "Map" object with bounds
- Create a "Rover" object with co-ords
- add the rover as a property onto the map
- loop through movements and update rover location
- validate Rover does not make illegal moves (go out of bounds) ? (or just create a warning that it's out of bounds and let it continue to nav?)
- at the and, return the rover's current co-ords and direction (x, y, direction)

### Add more Rovers

- In the query, check if the and validate line pairs (lines 2 and 3) and see if there are valid directions and movements.
- Create new rovers and add them to the map object.

### Create in interface:

- Think of a way to display the map, either in a web interface or print a grid to the console, ie.
```
 ____   ____  ____ 
|R1(N)|      |     |
 ____   ____  ____ 
|     |      |R2(E)|
 ____   ____  ____ 
|     |      |     |
 ____   ____  ____ 
```
