<?php
/**
 * Created by PhpStorm.
 * User: luizcarlos
 * Date: 23/09/15
 * Time: 20:38
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ClientRepository;
use CodeProject\Validators\ClientValidator;
use Illuminate\Contracts\Validation\ValidationException;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{

    /*
     * @var ClientRepository
     */
    protected $repository;

    /*
     * @var ClientValidator
     */
    protected $validator;
    /**
     * ClientService constructor.
     * @param $repository
     */
    public function __construct(ClientRepository $repository, ClientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data){

        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }catch (ValidatorException $e){
            return [
                'error'=> true,
                'message'=> $e->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id){
        try{
            $this->validator->with($data)->passesOrFail();
            $this->repository->update($data, $id);
        }catch (ValidatorException $e){
            return [
                'error'=> true,
                'message'=> $e->getMessageBag()
            ];
        }
    }

}