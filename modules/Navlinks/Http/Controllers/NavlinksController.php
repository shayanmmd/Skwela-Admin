<?php

namespace Navlinks\Http\Controllers;

use Navlinks\Repository\NavlinksRepository;
use Symfony\Component\HttpFoundation\Response;

class NavlinksController
{

    public function __construct(
        private NavlinksRepository $navlinksRepository
    ) {}

    public function showNavlinksView()
    {
        try {
            $navlinks = $this->navlinksRepository->all();

            $parents = $this->navlinksRepository->getParents();

            return view('NavlinksViews::navlinks', [
                'navlinks' => $navlinks,
                'parents' => $parents
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete()
    {
        try {
            $payload = request()->all();

            $res = $this->navlinksRepository->delete($payload['id']);

            if ($res == 0)
                return response()->json(['success' => false, 'msg' => 'it has an error']);

            return response()->json(['success' => true, 'msg' => 'the item successfully deleted']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'msg' => 'it has an error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function add()
    {
        try {
            $payload = request()->all();

            if ($payload['name'] === null)
                return response()->json(['success' => false, 'msg' => 'name can not be null']);

            if ($payload['parentId'] === 'null')
                $payload['parentId'] = null;

            $res =  $this->navlinksRepository->add($payload['name'], $payload['parentId']);
            
            if (!$res)
                return;

            return response()->json(['success' => true, 'msg' => 'it is made']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'msg' => $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function edit()
    {
        try {

            $payload = request()->all();

            if ($payload['name'] === null)
                return response()->json(['success' => false, 'msg' => 'name can not be null']);

            if ($payload['parentId'] === 'null')
                $payload['parentId'] = null;

            $res =  $this->navlinksRepository->edit($payload['id'],$payload['name'], $payload['parentId']);

            if (!$res)
                return;

            return response()->json(['success' => true, 'msg' => 'it is made']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'msg' => $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function editShow()
    {   
        $id = request()->all()['id'];

        $navlink = $this->navlinksRepository->getById($id);

        return response()->json([
            'name' => $navlink->name,
            'parentId' => $navlink->parentId
        ]);
    }
}
