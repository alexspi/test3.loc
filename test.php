<?php
/*
	task
	1. Напишите функцию подготовки строки, которая заполняет шаблон данными из указанного объекта
	2. Пришлите код целиком, чтобы можно его было проверить
	3. Придерживайтесь code style текущего задания
	4. По необходимости - можете дописать код, методы
	5. Разместите код в гите и пришлите ссылку
*/

class Api
{
    public function __construct()
    {

    }


    /**
     * Заполняет строковый шаблон template данными из объекта object
     *
     * @param array $array
     * @param string $template
     * @return        string
     * @version        v.1.0 (dd/mm/yyyy)
     * @author        User Name
     */
    public function get_api_path(array $array, string $template): string
    {
        $key = array_keys($array);
        $val = array_values($array);

        $result = str_replace($key, $val, $template);
//        $result = str_replace("%id%", $array['id'], $template);
//        $result = str_replace("%name%", $array['name'], $result);
//        $result = str_replace("%role%", $array['role'], $result);
//        $result = str_replace("%salary%", $array['salary'], $result);

        return $result;
    }
}

$user =
    [
        'id' => 20,
        'name' => 'John Dow',
        'role' => 'QA',
        'salary' => 100
    ];

$api_path_templates =
    [
        "/api/items/%id%/%name%",
        "/api/items/%id%/%role%",
        "/api/items/%id%/%salary%"
    ];

$api = new Api();

$api_paths = array_map(function ($api_path_template) use ($api, $user) {
    return $api->get_api_path($user, $api_path_template);
}, $api_path_templates);

echo json_encode($api_paths, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);

$expected_result = ['/api/items/20/John%20Dow', '/api/items/20/QA', '/api/items/20/100'];
