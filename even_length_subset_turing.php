<?php
/**
 * @author Oyetunde Joseph Oluwasomidotun
 * Date: 24th May, 2023.
 * Why come up with this? I got angry after failing this test in Turing coding test challenge and decided to challenge myself afterwards and then got it in less than 15mins.
 * 
 * Coding Challenge: Given a set of numbers k, find all subsets of k such that each has an even number of integers, and then return the sum
 * of all these subsets.
 * A subset is a contiguous subsequenceof k
 * Example: 
 *  Input: k = [1,4,2,5]
 *  Output: 30
 *  Explanation: The possible subarrays of k and their sums are:
 *  [1,4] = 5
 *  [4,2] = 6
 *  [2,5] = 7
 *  [1,4,2,5] = 12
 *  The sum of all subarrays = 5 + 6 + 7 + 12 = 30
 */


function evenLength($arr){
	$newArr = [];
    for($i = 0; $i < count($arr); $i++){
    	if($i + 1 < count($arr)){
        	$newArr[] = [$arr[$i], $arr[$i+1]];
        } if(($i+1) >= 4){
        	$newArr[] = popArray(4, $arr, $i);
        } if(($i+1) >= 6){
        	$newArr[] = popArray(6, $arr, $i);
        } if(($i+1) >= 8){
        	$newArr[] = popArray(8, $arr, $i);
        }
        // you can continue to add your conditions depending on the weight of your array or do well to improve.
    }
    
    $newArr = array_map(function($val){
    	return array_reduce($val, function($tot,$v){
        	return $tot + $v;
        });
    }, $newArr);
    $result = array_reduce($newArr,function($tot,$v){
    	return $tot + $v;
    });
    print_r($result);
}
function popArray($len, $arr, $indx){
	$result = [];
    $j = $len;
	for($i = 0; $i < $len; $i++){
    	$j--;
    	$result[] = $arr[$indx-$j];
    }
    return $result;
}
evenLength([1,4,2,5,3,8]); //supply your desired array here
