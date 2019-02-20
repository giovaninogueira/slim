<?php

namespace App\Controllers;

use App\Models\Dev;
use Slim\Http\Response;

/**
 * Class DevController
 * @package App\Controllers
 */
class DevController
{
    /**
     * @param $params
     * @return int|Response
     */
    public static function insert($params)
    {
        $response = new Response();
        try {
            $dev = new Dev();
            $dev->name = $params->name;
            $dev->email = $params->email;
            $dev->save();
            return $response->withStatus(201)->write($dev->toJson());
        } catch (\Exception $e) {
            return $response->withStatus(400)->write($e->getMessage());
        }
    }

    /**
     * @param $params
     * @param $id
     * @return Response
     */
    public static function update($params, $id)
    {
        $response = new Response();
        try {
            $dev = Dev::findOrFail($id);
            $dev->name = $params->name;
            $dev->email = $params->email;
            $dev->save();
            return $response->withStatus(200)->write($dev->toJson());
        } catch (\Exception $e) {
            return $response->withStatus(404)->write('result not found');
        }
    }

    /**
     * @param $id
     * @return Response
     */
    public static function delete($id)
    {
        $response = new Response();
        try {
            $dev = Dev::findOrFail($id);
            $dev->delete();
            return $response->withStatus(200);
        } catch (\Exception $e) {
            return $response->withStatus(404)->write('result not found');
        }
    }

    /**
     * @return Response
     */
    public static function select()
    {
        $response = new Response();
        try {
            return $response->write(Dev::all()->toJson());
        } catch (\Exception $e) {
            return $response->withStatus(400)->write($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return Response
     */
    public static function selectBy($id)
    {
        $response = new Response();
        try {
            return Dev::findOrFail($id)->toJson();
        } catch (\Exception $e) {
            return $response->withStatus(400)->write('result not found');
        }
    }
}