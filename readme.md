# Awssat website / Source code

This is a repo of Awssat website's source code. Once you edit the code here, it will be automatically updated on the website using Github actions.

## Structures

All needed files are in the `source` folder. The structure is as follows:
\_posts: every file here is a blog post and it will be listed in the blog as such.
\_tags: this folder is generated automatically by the website. It contains all tags used in the blog posts.
\_assets and \_layouts: these folders are templates that you need to change if you want to change the look of the website.
assets: is generated automatically by the website.

## New blog post

Add new .md file in \_posts folder, and it will be automatically added to the blog. Any one can publish a blog post as long as it's an original post written by contributer him/herself. The post will be published on the website after it's approved by the team.

-   Navigate to `https://github.com/awssat/website/new/master/source/_posts`
-   Create your blog post.
-   Title and filename should match each other. but filename must be in kebab case `my-blog-post.md`
-   Meta data is reqiured,

```
---
title: My blog post
date: 2021-12-23
description: description of the post
tags: [php, javascript]
author: Mohammed Joshua
author_link: http://twitter.com/...
---

the rest of the post using markdown ...
```
