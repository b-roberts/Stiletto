<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Article;
use \App\Connection;

class ConnectionController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $connection = Connection::findOrFail($id);
        $articles = Article::get()->map(function($e) {
            return ['id'=>$e->id, 'label'=>"($e->concept) $e->title"];})->values();


        $connectionTypes = \App\ConnectionType::orderBy('label')->get()->pluck('label')->toArray();
        $connectionTypes = array_combine($connectionTypes, $connectionTypes);
        return view('connection.edit', [
            'connection'=>$connection,
            'article'=>$connection->from,
            'link'=>$connection->to,
            'relation'=>$connection->relationship,
            'articles'=>$articles,
            'connectionTypes'=>$connectionTypes
            ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Connection $connection)
    {
        //
       $connection->relationship =  $request->get('relation');
	   if ($request->get('reverse')){
            $connection->to_id =  $connection->from_id;
			$connection->from_id =  $request->get('related');
       }
       else {
            $connection->to_id =  $request->get('related');

       }
        
        $connection->save();

        return redirect(route('article.show',['article'=>$connection->from]))->with('flash_success','saved');
    }


    public function destroy(Connection $connection){
        $connection->delete();
        return redirect(route('article.show',['article'=>$connection->from]))->with('flash_success','deleted');
    }
}