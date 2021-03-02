<?php 
namespace App\Transformers;

class GraphTransformer
{
    protected $colors = [
        'Item'=> "#83548B",
        'Character'=>'#f32712',
        'Place'=>'#32F359',
        'Adventure'=>"#FFAA33",
        'Event'=>'#AAFF33',
        'Group'=>'#33AAFF',
    ];
    protected $graph = [];
    public function getGraph()
    {
        return $this->graph;
    }
    public function transform($article){
        if(!$this->hasNode($article->id)){
            $node = $this->addNode($article);
        }
        else {
            $node = $this->getNode($article);
        }
            foreach($article->forwardConnections as $connection) {
                if(!$this->hasNode($connection->id)){
                    $this->addNode($connection);
                }
                $node->adjacencies[] = [
                    'nodeFrom'=>$article->id,
                    'nodeTo'=>$connection->id,
                ];
            }
            foreach($article->reverseConnections as $connection) {
                if(!$this->hasNode($connection->id)){
                    $this->addNode($connection);
                }
                $node->adjacencies[] = [
                    'nodeFrom'=>$article->id,
                    'nodeTo'=>$connection->id,
                ];
            }
            return $this->graph;
    }

    protected function hasNode($id)
    {
        foreach($this->graph as $node) {
            if ($node->id ==$id)
            {
                return true;
            }
        }
        return false;
    }

    protected function getNode($article)
    {
        foreach($this->graph as $node) {
            if ($node->id ==$article->id)
            {
                return $node;
            }
        }
        return false;
    }

    protected function &addNode($article)
    {
        $node = (object) [
            'id'=>$article->id, 
            'name'=>$article->title, 
            'adjacencies'=>[],
            'data'=>[
                'weight'=>1
            ]
            ];
            if (isset($this->colors[$article->concept])){
                $node->data['$color']=$this->colors[$article->concept];
            }
            $this->graph[] = $node;
            return $node;
    }
}