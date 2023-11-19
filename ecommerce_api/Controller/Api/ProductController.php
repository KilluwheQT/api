<?php
class ProductController extends BaseController
{
    /** 
* "/user/list" Endpoint - Get list of users 
*/
    // public function listAction()
    // {
    //     $strErrorDesc = '';
    //     $requestMethod = $_SERVER["REQUEST_METHOD"];
    //     $arrQueryStringParams = $this->getQueryStringParams();
    //     if (strtoupper($requestMethod) == 'GET') {
    //         try {
    //             $productModel = new ProductModel();
    //             $intLimit = 10;
    //             if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
    //                 $intLimit = $arrQueryStringParams['limit'];
    //             }
    //             $arrCats = $productModel->getProducts($intLimit);
    //             $responseData = json_encode($arrCats);
    //         } catch (Error $e) {
    //             $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
    //             $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
    //         }
    //     } else {
    //         $strErrorDesc = 'Method not supported';
    //         $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
    //     }
    //     // send output 
    //     if (!$strErrorDesc) {
    //         $this->sendOutput(
    //             $responseData,
    //             array('Content-Type: application/json', 'HTTP/1.1 200 OK')
    //         );
    //     } else {
    //         $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
    //             array('Content-Type: application/json', $strErrorHeader)
    //         );
    //     }
    // }

    public function bycategoryAction(){
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();


        if (strtoupper($requestMethod) == 'GET') {
            try {
                $model = new ProductModel();
                $catid = "";
                if (isset($arrQueryStringParams['catid']) && $arrQueryStringParams['catid']) {
                    $catid = $arrQueryStringParams['catid'];
                }
                
                
                $arrResult = $model->getProductsByCatId($catid);
                $responseData = json_encode($arrResult);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }


    public function byslugAction(){
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();


        if (strtoupper($requestMethod) == 'GET') {
            try {
                $model = new ProductModel();
                $slug = "";
                if (isset($arrQueryStringParams['slug']) && $arrQueryStringParams['slug']) {
                    $slug = $arrQueryStringParams['slug'];
                }
                
                
                $arrRes = $model->getProductBySlug($slug);
                $responseData = json_encode($arrRes);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

}