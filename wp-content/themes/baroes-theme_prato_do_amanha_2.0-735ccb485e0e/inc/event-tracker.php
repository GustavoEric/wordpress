<?php

function formatEventJSON($params) {
    return json_encode($params);
}

function ga4PageEvents($data) {
    $gaEvents = [];
    foreach($data as $type => $events) {
        if($events == null) {
            continue;
        }
        foreach($events as $item => $values) {
            if($item === 'tags') {
                foreach($values as $tag) {
                    if($tag->slug) {
                        $gaEvents[] = [
                            'event_type' => 'pageview',
                            'event_name' => 'nome_da_tag',
                            'event_parameters' => [
                                'tag' => $tag->slug
                            ]
                        ];
                    }
                }
                continue;
            }
            if($item === 'categorias') {
                foreach($values as $cat) {
                    if($cat->slug) {
                        $gaEvents[] = [
                            'event_type' => 'pageview',
                            'event_name' => 'nome_da_categoria',
                            'event_parameters' => [
                                'categoria' => $cat->slug
                            ]
                        ];
                    }
                }
                continue;
            }
            if($item === 'camposTematicos') {
                if(! $values) {
                    continue;
                }
                foreach($values as $ct) {
                    if(!is_array($values)) {
                        continue;
                    }
                    if($ct->post_name) {
                        $gaEvents[] = [
                            'event_type' => 'pageview',
                            'event_name' => 'campo_tematico',
                            'event_parameters' => [
                                'campo' => $ct->post_name
                            ]
                        ];
                    }
                }
                continue;
            }
            $event = ['event_type' => $type,'event_name' => $item];
            if($values === null) {
                continue;
            }
            if(gettype($values) !== 'array') {
                $event['event_parameters'] = [$item => $values];
            } else {
                $event['event_parameters'] = $values;
            }
            $gaEvents[] = $event;
        }
    }

    $response = '';
    foreach($gaEvents as $gaEvent) {
        $auxDataGA = json_encode($gaEvent);
        $response .= "<input type='hidden' data-ga4='{$auxDataGA}' />";
    }
    return $response;
}