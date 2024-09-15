<?php

namespace Navlinks\Repository;

use DB;
use Navlinks\Http\Models\Navlink;

class NavlinksRepository
{
    public function all()
    {
        try {
            return DB::table('navlinks as child')
                ->leftJoin('navlinks as parent', 'child.parentId', '=', 'parent.id')
                ->select('child.id', 'child.link' , 'child.name as name', 'parent.name as parentName')
                ->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            return DB::table('navlinks')
                ->delete($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getParents()
    {
        try {
            return DB::table('navlinks')
                ->where('navlinks.parentId', '=', null)
                ->select('navlinks.id', 'navlinks.name')
                ->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function add($name, $parentId, $link)
    {
        try {
            return Db::table('navlinks')
                ->insert([
                    'name' => $name,
                    'parentId' => $parentId,
                    'link' => $link
                ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id, $name, $parentId, $link)
    {
        try {
            return Db::table('navlinks')
                ->where('navlinks.id', '=', $id)
                ->update([
                    'name' => $name,
                    'parentId' => $parentId,
                    'link' => $link
                ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getById($id)
    {
        try {
            return Db::table('navlinks')
                ->select('navlinks.name', 'navlinks.parentId', 'navlinks.link')
                ->where('navlinks.id', '=', $id)
                ->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
