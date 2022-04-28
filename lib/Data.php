<?php
require_once('DataBase.php');

class Data
{
	public function getCards()
	{
		$db = new DataBase();
		$data = $db->getData();

		return $this->createTree($data);
	}

	//create tree with elements
	public function createTree($data)
	{
		$parents = [];
		foreach ($data as $key => $item) {
			$parents[$item['parentId']][$item['id']] = $item;
		}

		$treeElem = $parents[0];
		$this->generateElemTree($treeElem, $parents);

		return $treeElem;
	}

	private function generateElemTree(&$treeElem, $parents)
	{
		foreach ($treeElem as $key => $item) {
			if (!isset($item['children'])) {
				$treeElem[$key]['children'] = [];
			}

			if (array_key_exists($key, $parents)) {
				$treeElem[$key]['children'] = $parents[$key];
				$this->generateElemTree($treeElem[$key]['children'], $parents);
			}
		}
	}
}
