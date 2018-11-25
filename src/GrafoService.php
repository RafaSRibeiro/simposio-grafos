<?php
/**
 * Created by PhpStorm.
 * User: rafael.s.ribeiro
 * Date: 25/11/2018
 * Time: 12:36
 */

namespace App;

use App\Utils\SortUtils;

class GrafoService
{
    private $grafo;

    private $cor  = [];

    public function __construct() {
//        $grafo['vertices'] = [1, 2, 3, 4, 5, 6, 7, 8];
//        $grafo['arestas'][1] = [5, 6, 7, 8];
//        $grafo['arestas'][2] = [5, 6, 7, 8];
//        $grafo['arestas'][3] = [5, 6, 7, 8];
//        $grafo['arestas'][4] = [5, 6, 7, 8];
//        $grafo['arestas'][5] = [1, 2, 3, 4];
//        $grafo['arestas'][6] = [1, 2, 3, 4];
//        $grafo['arestas'][7] = [1, 2, 3, 4];
//        $grafo['arestas'][8] = [1, 2, 3, 4];

//        $grafo['vertices'] = ['A', 'B', 'C', 'D', 'E'];
//        $grafo['arestas']['A'] = ['C','E'];
//        $grafo['arestas']['B'] = ['C', 'D', 'E'];
//        $grafo['arestas']['C'] = ['A', 'B', 'D'];
//        $grafo['arestas']['D'] = ['B', 'C', 'E'];
//        $grafo['arestas']['E'] = ['A', 'B', 'D'];

        $grafo['vertices'] = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        $grafo['arestas']['A'] = ['B'];
        $grafo['arestas']['B'] = ['A', 'C', 'G'];
        $grafo['arestas']['C'] = ['B', 'D'];
        $grafo['arestas']['D'] = ['C', 'E'];
        $grafo['arestas']['E'] = ['D', 'H', 'F'];
        $grafo['arestas']['F'] = ['E', 'G'];
        $grafo['arestas']['G'] = ['B', 'F'];
        $grafo['arestas']['H'] = ['E'];
        $this->grafo = $grafo;
    }


    public function welshPowell() {
        $grafo = $this->grafo;

        $graus = [];
        foreach ($grafo['vertices'] as $vertice) {
            $this->cor[$vertice] = 0;
            $graus[] = [
                'vertice' => $vertice,
                'grau' => count($grafo['arestas'][$vertice])
            ];
        }
        $ordenadosEmGraus = SortUtils::array_sort($graus, 'grau', SORT_DESC);
        $cores = [1,2,3,4,5,6,7,8,9,10];
        $idCor = -1;
        foreach ($ordenadosEmGraus as $vertice) {
            if ($this->cor[$vertice['vertice']] == 0) {
                $idCor++;
                $this->cor[$vertice['vertice']] = $cores[$idCor];
                foreach ($this->getNaoAdjacentes($vertice['vertice']) as $naoAdjacente) {
                    if (!$this->possuiAdjacenteMesmaCor($naoAdjacente, $cores[$idCor])) {
                        $this->cor[$naoAdjacente] = $cores[$idCor];
                    }
                }
            }
        }

        $result = [];
        foreach ($grafo['vertices'] as $vertice) {
            $result[] = [
                'nome' => $vertice,
                'cor' => $this->cor[$vertice]
            ];
        }
        return $result;
    }

    private function possuiAdjacenteMesmaCor($vertice, $corAtual): bool {
        $grafo = $this->grafo;
        foreach ($grafo['arestas'][$vertice] as $verticeAdjacente) {
            if ($this->cor[$verticeAdjacente] == $corAtual)
                return true;
        }
        return false;
    }

    private function getNaoAdjacentes($vertice) {
        $grafo = $this->grafo;
        $naoAdjacentes = $grafo['arestas'][$vertice];
        return array_diff($grafo['vertices'], $naoAdjacentes);
    }

}