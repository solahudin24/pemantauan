<!DOCTYPE html>

<!--
Copyright 2017 Google Inc.
Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at
    http://www.apache.org/licenses/LICENSE-2.0
Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
-->

<html lang="en">
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-33848682-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag() {
  window.dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', 'UA-33848682-1');
</script>

<meta charset="utf-8">
<meta name="description" content="Simplest possible examples of HTML, CSS and JavaScript.">
<meta name="author" content="//samdutton.com">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta itemprop="name" content="simpl.info: simplest possible examples of HTML, CSS and JavaScript">
<meta itemprop="image" content="/images/icons/icon192.png">
<meta id="theme-color" name="theme-color" content="#fff">

<link rel="icon" href="/images/icons/icon192.png">

<base target="_blank">


<title>Notification API</title>

<link rel="stylesheet" href="../css/main.css">

<style>
  button {
    width: 10em;
  }
  input {
    border: 1px solid #ccc;
    color: #666;
    display: block;
    font-size: 1em;
    margin: 0 0 1em 0;
    padding: 0.2em;
    width: 100%;
  }
  </style>

</head>

<body>

  <div id="container">

    <h1><a href="../index.html" title="simpl.info home page">simpl.info</a> Notification API</h1>

    <input type="text" value="Blah blah blah">
    <button>Show notification</button>

    <script src="js/notif.js"></script>

    <a href="https://github.com/samdutton/simpl/blob/gh-pages/notification" title="View source for this page on GitHub" id="viewSource">View source on GitHub</a>
  </div>

</body>
</html>