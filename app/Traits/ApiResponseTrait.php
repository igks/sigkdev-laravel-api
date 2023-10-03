<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
  /**
   *  @param array|Arrayable|JsonSerializable|null $data
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function success($data)
  {
    return new JsonResponse($data, JsonResponse::HTTP_OK);
  }

  /**
   *  @param array|Arrayable|JsonSerializable|null $data
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function created($data)
  {
    return new JsonResponse($data, JsonResponse::HTTP_CREATED);
  }

  /**
   *  @param array|Arrayable|JsonSerializable|null $data
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function updated($data)
  {
    return new JsonResponse($data, JsonResponse::HTTP_CREATED);
  }

  /**
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroyed()
  {
    return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
  }
}