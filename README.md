# GoLang-Warehouse-Calculator

This problem has also been resolved in Go lang and Vue.js - just search in repositories


Open this file in "github - raw" or click on this link for all to make sense:
https://raw.githubusercontent.com/JohnDoeRO/GoLang-Warehouse-Calculator/main/README.md


*** READ THIS:
* If you have to take a test for an interview with a company whose name is almost identical to ebay
* I recommend you look elsewhere for the solution - because after I sent them my solution
* I have never heard of them :)
***

Werhouse laid out as below:
_________________________________________
|          y                            |
|   |A10|B10|   |C10|D10|   |E10|F10|   |
|   |A09|B09|   |C09|D09|   |E09|F09|   |
|   |A08|B09| x |C09|D09|   |E09|F09|   |
|   |A07|B09|   |C09|D09|   |E09|F09|   |
|   |A06|B09|   |C09|D09|   |E09|F09|   |
|   |A05|B09|   |C09|D09|   |E09|F09|   |
|   |A04|B09|   |C09|D09|   |E09|F09|   |
|   |A03|B09|   |C09|D09|   |E09|F09|   |
|   |A02|B09|   |C09|D09|   |E09|F09|   |
|   |A01|B09|   |C09|D09|   |E09|F09|   |
|    p1          p2          p3         |
-----------------------------------------

Products exist in bin locations from A1-F10
● Picking stations are marked as P1, P2 and P3
● A picker can only pick a bin from the side
    ○ A picker standing at X can pick from bins B6 and C6
    ○ A picker standing at Y cannot pick from anywhere
● A picker can walk directly through the packing stations but cannot walk through any product bins


Requirements
1. Create a database of 60 products. Assign each a stock level and a unique bin location from the range A1 - F10 (see the warehouse floor plan below).
2. Provide a tool for querying a product or a bin location. It should return the product description, bin location and current stock level.
3. Provide a tool to generate a picking route for a list of five or more products. The algorithm should consider factors such as speed, efficiency and scalability.
4. All routes should start and end at a picking station. Your algorithm may choose which ones.


About this task (picking route)
In theory we need to check if the "order" can be solved - if we have all products in stock.
If yes it is necessary to upload the stock (stock minus current order)
All warehouse fields from products table can be in a separate table.
First I generate some random products 5-10.
Then I grouped the products by "corridors", I chose to start with the picker that has the most products.
After that the next one but starting from the top.
After that the next one but starting from bottom.
and so on until all the groups are finished (are max 4 in our case)
I displayed maybe more than I needed to show the route.

In theory after group by corridors for next step need to made another group by row (1-5 and 6-10) to determine which is the shortest route: up or down.
I considered that the route obtained is good enough for this exercise.
The math for this looks like this:
i - index of last product from first group (eg: A7 i=7)
j - index of next product (eg: C8 j=8)
i+j+3
25-i-j (come from this 11-i+3+11-j)
We compare the results of the two and see which road is shorter on top or on bottom.