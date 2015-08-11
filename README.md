# AZ Databases

# Synopsis

Director is a router. Routing is the process of determining what code to run
when a URL is requested.

# Motivation

A routing library that works in both the browser and node.js environments with
as few differences as possible. Simplifies the development of Single Page Apps
and Node.js applications. Dependency free (doesn't require jQuery or Express,
etc).

# Features

* [Permanent links](#permanent-link)

# Usage

* [API Documentation](#api-documentation)
* [Frequently Asked Questions](#faq)

## Permanent links

In AZ Database all pages and actioons are permanent URLs

This is so its easy to email (or embed) links to specific parts of AZ Databases.

After you have done the click (ie. on a Letter) or action (ie. search or area refinement) to get to the page you want - just copy the URL in the browser and it will work as a permament URL

Below are examples of all the different linking types in AZ Databases

### Category

Links to an Category (such as Engineering)
http://www.swinburne.edu.au/library/search/databases/#/area/engineering

![cat](docs/images/linking-cat.png)

### Sub-category
Linking to an Sub-Category (such as Engineering > Civil)
http://www.swinburne.edu.au/library/search/databases/#/area/engineering/subject/civil

![cat](docs/images/linking-sub-cat.png) 
### Letters

Links to Letters (such as G)
http://www.swinburne.edu.au/library/search/databases/#/letter/G

![cat](docs/images/linking-letter.png)

## Search

Linking to search results (such as scopus)
http://www.swinburne.edu.au/library/search/databases/#/search/scopus

![cat](docs/images/linking-search.png)
### Title search

Linking to title searches (such as scopus)
http://www.swinburne.edu.au/library/search/databases/#/search/title%3Ascopus

![cat](docs/images/linking-title-search.png)
### Exact title search

Linking to exact title search (such as "ebscohost")
http://www.swinburne.edu.au/library/search/databases/#/search/title%3A%20%22ebscohost%22

![cat](docs/images/linking-title-exact.png)

## Title searching

How in the new AZ databases do you link to just 1 specific title?

A search for ebscohost in AZ Databases, returns all 42 ebscohost databases in Alma
note: a general search searches the url, title, description, alt title and other marc fields
refer link and screenshot below

http://www.swinburne.edu.au/library/search/databases/#/search/ebscohost

![search](docs/images/search.png)

By adding title: to the start of the search query we can limit to a title search for ebscohost, this returns the 2 database with ebscohost in the title
refer link and screenshot below
http://www.swinburne.edu.au/library/search/databases/#/search/title%3Aebscohost

![search](docs/images/search-title.png)

By putting quotes around the search term we can limit to an exact title search, this returns just 1 result - which is the main ebscohost database
refer link and screenshot below
http://www.swinburne.edu.au/library/search/databases/#/search/title%3A%20%22ebscohost%22

![search](docs/images/search-title-exact.png)
 
By using title searches in AZ Databases you can create links to a group or an single title.
 
