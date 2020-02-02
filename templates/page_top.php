<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$this->e($page_title)?></title>
    <meta charset="utf-8" />
    <link rel="schema.dcterms" href="http://purl.org/dc/terms/" />
    <meta name="dcterms.format" content="text/html" />
    <meta name="dcterms.language" content="en" />
    <meta name="dcterms.type" content="Text" />
    <meta name="dcterms.publisher" content="Australian Government Linked Data Working Group" />
    <meta name="dcterms.creator" content="Nicholas Car" />
    <meta name="dcterms.title" content="Australian Government Linked Data Working Group home page" />
    <meta name="dcterms.date" content="2017-02-18T20:30+10:00" />
    <meta name="dcterms.modified" content="2018-07-25T14:30+10:00" />
    <meta name="description" content="Home page of the Australian Government Linked Data Working Group" />
    <meta name="generator" content="Lovingly coded by hand" />

    <style>
        body {
            font-family: Roboto,sans-serif;
            font-weight: 300;
            color: rgb(133, 25, 2);
            background: url("../img/comms_bg_grey.svg") top right no-repeat;
            text-align: center;
        }
        #header {
            width: 900px;
            margin: 0 auto;
            text-align: left;
        }

        #main {
            width: 900px;
            margin: 0 auto;
            text-align: left;
        }

        h1, h2, h3, h4 {
            font-family: "Helvetica Neue", sans-serif;
            color: rgb(133, 25, 2);
            font-weight: 400;
        }

        h1 {
            font-size: 2.4em;
        }
        h2 {
            font-size: 2em;
        }

        h3 {
            font-size: 1.5em;
        }

        h4 {
            font-size: 1.25em;
        }

        p, li {
            font-family: "Helvetica Neue", sans-serif;
            line-height: 1.5em;
            color: rgb(51, 26, 0);
        }

        a {
            color: rgb(153, 79, 0); /*#994F00;*/
        }

        #nav {
            padding-top:60px;
        }

        #footer {
            background: url("../img/comms_footer_bg.svg") top left no-repeat;
            background-color: #e4e4e4;
            padding-top: 2em;
            margin-top: 25px;
        }

        #footer_content {
            display: grid;
            grid-template-columns: 700px 1fr;
            width: 900px;
            margin: 0 auto;
            text-align: left;
            line-height: 2em;
            font-size: smaller;
        }

        #footer_content a {
            color: #616161;
            border-bottom: 1px solid currentcolor;
            text-decoration: none;
        }

        /* linked.data.gov.au additions */
        div.table {
            margin: 20px;
            text-align: center;
        }

        span.caption {
            font-size: small;
        }

        table.lined {
            margin: 0 auto;
            border-collapse: collapse;
            border: solid 2px black;
            text-align: left;

            table-layout:fixed;
            width: 800px;
        }

        table.lined td,
        table.lined th {
            border: solid 1px black;
            padding: 5px;

            overflow: hidden;
            word-wrap: break-word;
            max-width:150px;
        }

        .ochre {
            vertical-align: top;
            background-color: rgb(133, 25, 2);
            color: white;
            padding: 10px;
        }
        .ochre a {
            color: #e4e4e4;
        }

        .ochre h2,
        .ochre h3,
        .ochre h4 {
            color: white;
        }

        .grey {
            background-color: #e4e4e4; 
            padding:10px;
            margin-bottom: 10px;
        }

        .white {
            vertical-align: top;
            background-color: white;
            color: rgb(133, 25, 2);
            padding: 5px;
        }

        table.altrows {
            border-collapse: collapse;
        }


        table.altrows tr:nth-child(even) {
            background: #e4e4e4;
            border-top: 1px solid #D8D8D8;
        }
        table.altrows tr:nth-child(odd) {
            background: #ffffff;
            border-top: 1px solid #D8D8D8;
        }

        table.altrows th,
        table.altrows td {
            /*border: solid 1px black;*/
            padding: 5px;
        }

        table.pretty th {
            color: white;
            font-weight: bold;
            background-color: #006983;
        }

        /* Tabs */
        /* Style the tab */
        div.tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        div.tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        div.tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        div.tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        button {
            font-weight: 400;
            font-size: 100%;
            font-family: Roboto,sans-serif;
        }

        code {
            font-size: large;
        }

        header {
            width: 900px;
            margin: 0 auto;
            text-align: left;
        }

        footer {
            background: url("http://linked.data.gov.au/style/img/comms_footer_bg.svg") top left no-repeat;
            background-color: #e4e4e4;
            padding-top: 2em;
            margin-top: 25px;
        }

        table.alternating {
            width:100%;
            border-collapse: collapse;
        }

        table.alternating th,
        table.alternating td {
            padding: 5px;
        }

        table.alternating tr:nth-child(odd) {
            background: #efefef;
            border-top: 1px solid #D8D8D8;
        }

        table.alternating tr:nth-child(even) {
            background: #ffffff;
            border-top: 1px solid #D8D8D8;
        }
    </style>
</head>
<body>
<header id="header" style="text-align:right; padding-top:10px;">
    <div style="width:150px; height:150px; float:left;">
        <img src="http://www.linked.data.gov.au/style/img/agldwg-logo-ochre-150.png" alt="AGLDWG logo" />
    </div>
    <div id="nav">
        <a href="/">Home</a> |
        <a href="http://www.linked.data.gov.au/governance">Governance</a> |
        <a href="http://www.linked.data.gov.au/assistance">Assistance</a> |
        <a href="http://www.linked.data.gov.au/showcase">Showcase</a> |
        <a href="http://www.linked.data.gov.au/events">Events</a> |
        <a href="http://www.linked.data.gov.au/groups">Groups</a> |
        <a href="http://www.linked.data.gov.au/howto">How To</a> |
        <a href="http://www.linked.data.gov.au/contact">Contact</a> |
        <a href="http://www.linked.data.gov.au/join">Join</a>
    </div>
</header>

<div id="main" style="clear:both;">
