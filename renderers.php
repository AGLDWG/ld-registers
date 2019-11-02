<?php
// functions
// render functions
// general render function
// get data


// render functions
function render_as_reg_html($templates, $register_items, $page_title, $register_title) {
    echo $templates->render(
        'register', [
        'page_title' => $page_title,
        'register_title' => $register_title,
        'register_items' => $register_items
    ]);
}

function render_as_reg_turtle($templates, $register_items, $register_title, $register_uri) {
    header('Content-Type: text/turtle');
    echo $templates->render(
        'register-ttl', [
        'register_title' => $register_title,
        'register_uri'=> $register_uri,
        'register_items' => $register_items
    ]);
}

function render_as_uri_list($register_items) {
    $content = '';
    foreach ($register_items as $register_item) {
        $content .= $register_item['uri'] . "\n";
    }
    header('Content-Type: text/uri-list');
    echo $content;
}

function render_altp_as_html($cp, $templates, $profiles, $page_title) {
    $resource_uri = $cp->get_fully_qualified_resource_uri();
    header('Content-Type: text/turtle');
    echo $templates->render(
        'altp', [
        'page_title' => $page_title,
        'resource_uri' => $resource_uri,
        'profiles' => $profiles
    ]);
}

function render_altp_as_turtle($cp, $templates, $profiles, $page_title) {
    $resource_uri = $cp->get_fully_qualified_resource_uri();
    header('Content-Type: text/turtle');
    echo $templates->render(
        'altp-ttl', [
        'page_title' => $page_title,
        'resource_uri' => $resource_uri,
        'profiles' => $profiles
    ]);
}

// general render function
function render_register($cp, $register_items, $profile_returning, $mediatype_returning, $profiles_supported, $page_title, $register_title, $register_uri) {
    switch ($profile_returning) {
        case 'http://www.w3.org/ns/dx/conneg/altr':
            // all Media Types for this profile use templates
            $templates = new League\Plates\Engine('templates');

            if ($mediatype_returning == 'text/turtle') {
                render_altp_as_turtle($cp, $templates, $profiles_supported, $page_title);
            } else {
                render_altp_as_html($cp, $templates, $profiles_supported, $page_title);
            }
            break;
        case 'https://w3id.org/profile/uri-list':
            // only one Media Type supported for this Profile so no if statement based on Media Type
            render_as_uri_list($register_items);
            break;
        default: // 'http://purl.org/linked-data/registry'
            // all Media Types for this profile use templates
            $templates = new League\Plates\Engine('templates');

            if ($mediatype_returning == 'text/turtle') {
                render_as_reg_turtle($templates, $register_items, $register_title, $register_uri);
            } else {
                render_as_reg_html($templates, $register_items, $page_title, $register_title);
            }
    }
}

// functions
// get data
function get_register_contents_from_drupal_json_api($api_uri) {
    // get the org/ register data from the AGLDWG catalogue
    $headers = array('Accept' => 'application/json');
    $request = Requests::get($api_uri, $headers);
    $data = json_decode($request->body);

    // declare a sort by title function
    function cmp($a, $b) {
        return strcmp($a->title, $b->title);
    }

    // sort data by title
    usort($data, "cmp");

    // create register items objects array
    $register_items = array();
    foreach ($data as $record) {
        $register_items[] = array(
            'uri' => 'http://linked.data.gov.au' . $record->field_agldwg_identifier,
            'title' => $record->title,
            'desc' => $record->description,
            'homepage' => $record->field_homepage,
            'agor_id' => $record->field_agor_identifier,
            'crs_id' => $record->field_crs_identifier
        );
    }

    return $register_items;
}