<?php

function routeIsActive($route): string
{
    return request()->routeIs($route) ? 'active' : '';
}

function actionMessage($type, $action): string
{
    if ($type == 'failed') {
        return "Data failed to be $action.";
    }

    return "Data successfully $action.";
}

function arrayOnly(array $array, array $keys): array
{
    return array_intersect_key($array, array_flip($keys));
}
