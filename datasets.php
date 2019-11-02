<?php
// include used resources
// declare available Profiles and default
// initialise a ConnegP helper object
// get returning representation's Profile
// declare available Media Types for requested Profile and default
// get returning representation's Media Type
// get the org/ register data from the AGLDWG catalogue
// make required ConnegP headers
// render result based on returning Profile & Media Type

// include used resources
require 'vendor/autoload.php';
require 'renderers.php';

// declare available Profiles and default
// (an array of Profile instances)
$profiles_supported = array(
    'http://purl.org/linked-data/registry' => new \NicholasCar\ConnegP\Profile(
        'Registry Ontology',
        'A list with minimal metadata formulated according to the Registry Ontology',
        array(
            'text/html',
            'text/turtle'
        ),
        'text/html'
    ),
    'https://w3id.org/profile/uri-list' => new \NicholasCar\ConnegP\Profile(
        'URI List',
        'A list of just registered item URIs, one per line',
        array(
            'text/uri-list'
        ),
        'text/uri-list'
    ),
    'http://www.w3.org/ns/dx/conneg/altr' => new \NicholasCar\ConnegP\Profile(
        'Alternate Representations Data Model',
        'The representation of the resource that lists all other representations (profiles and Media Types)',
        array(
            'text/html',
            'text/turtle'
        ),
        'text/html'
    )
);
$profiles_default = 'http://purl.org/linked-data/registry';

// initialise a ConnegP helper object
$cp = new \NicholasCar\ConnegP\ConnegP();

// get returning representation's Profile
$profiles_requested = $cp->get_profiles_requested();
$profile_to_return = $cp->get_profile_to_return($profiles_supported, $profiles_requested, $profiles_default);

// get returning representation's Media Type
$mediatypes_requested = $cp->get_mediatypes_requested();
$mediatype_to_return = $cp->get_mediatype_to_return(
    $profiles_supported[$profile_to_return]->mediatypes, // Media Types supported for the Profile being returned
    $mediatypes_requested,
    $profiles_supported[$profile_to_return]->mediatype_default // Media Type default for this Profile being returned
);

// get the org/ register data from the AGLDWG catalogue
$register_items = get_register_contents_from_drupal_json_api('http://catalogue.linked.data.gov.au/dataset/');

// make required ConnegP headers
header($cp->make_header_list_profiles($cp->get_fully_qualified_resource_uri(), $profiles_supported, $profiles_default));
header($cp->make_header_content_profile($profile_to_return));

// render result based on returning Profile & Media Type
render_register(
    $cp,
    $register_items,
    $profile_to_return,
    $mediatype_to_return,
    $profiles_supported,
    'Datasets Register',
    'Datasets',
    'http://linked.data.gov.au/dataset/'
);
