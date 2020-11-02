<?php

require_once 'connection.php';
$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method == 'get'){
    $sql = $pdo->query('select * from users as u  LEFT JOIN social as s on u.id = s.user_id');
    if($sql->rowCount() > 0){
        $data = $sql->fetchAll(PDO::FETCH_OBJ);
        
        foreach($data as $key => $item){

            $skills = explode(',', $item->skills);
            $skills = "'" .implode("','", $skills). "'";


            $sql = $pdo->query("SELECT * FROM skills WHERE id IN ($skills)");
            if($sql->rowCount() > 0){
                $data[$key]->skills = $sql->fetchAll(PDO::FETCH_OBJ);
            }else{
                $data[$key]->skills = [];
            }
            var_dump("$response");
            $response['result'][] = [
                'name'=> $item->name,
                'avatar_url'=> $item->avatar_url,
                'about'=> $item->about,
                'skills'=> $item->skills,
                'social'=> [
                    [
                        'name'=> 'github',
                        'url'=> $item->github
                    ],

                    [
                        'name'=> 'linkedin',
                        'url'=> $item->linkedin
                    ]

                ]
                    ];
        }
    }
}else{
    $response['error'] = 'método não permitido';
}

echo json_encode($response);
exit;