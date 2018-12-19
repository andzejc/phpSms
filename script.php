<?php

class Functions
{
	function findBestPlan()
	{
		$buffer = file_get_contents("input.json");
		$data = json_decode($buffer, true);
		$requiredIncome = $data['required_income'];
		$price1 = $data['sms_list'][0]['price'];
		$price2 = $data['sms_list'][1]['price'];
		$price3 = $data['sms_list'][2]['price'];
		$price4 = $data['sms_list'][3]['price'];
		$income1 = $data['sms_list'][0]['income'];
		$income2 = $data['sms_list'][1]['income'];
		$income3 = $data['sms_list'][2]['income'];
		$income4 = $data['sms_list'][3]['income'];
		$temp1 = $requiredIncome;
		$temp2 = $requiredIncome;
		$temp3 = $requiredIncome;
		$temp4 = $requiredIncome;
		$array1 = array();
		$array2 = array();
		$array3 = array();
		$array4 = array();
		$tempArray = array();
		$tempSum = 0;
		$summIncome1 = 0;
		$summIncome2 = 0;
		$summIncome3 = 0;
		$summIncome4 = 0;
		$summArray1;
		$summArray2;
		$summArray3;
		$summArray4;
		$isTrue1 = true;
		$isTrue2 = true;
		$isTrue3 = true;
		$isTrue4 = true;
		$errors = array();
		$solution = array();

		if ($requiredIncome <= 0) {
			$errors[] = 'Your required income is less or equal null.';
		}

		if (isset($data['max_messages']) && $requiredIncome > 0) {
			$maxMessages = $data['max_messages'];

			for ($i = 0; $i < $maxMessages && $isTrue1 == true; $i++) {
				if ($temp1 > $income4) {
					$temp1 = $temp1 - $income4;
					$array1[$i] = $price4;
					$summIncome1 = $summIncome1 + $income4;

				} else if (round($temp1, 3) === $income4) {
					$array1[$i] = $price4;
					$summIncome1 = $summIncome1 + $income4;
					$isTrue1 = false;
				} else if ($temp1 < $income4) {
					$array1[$i] = $price4;
					$summIncome1 = $summIncome1 + $income4;
					$isTrue1 = false;
				}
			}
			$summArray1 = array_sum($array1);

			for ($i = 0; $i < $maxMessages && $isTrue2 == true; $i++) {
				if ($temp2 > $income4) {
					$temp2 = $temp2 - $income4;
					$summIncome2 = $summIncome2 + $income4;
					$array2[$i] = $price4;
				} else if ($temp2 > $income3) {
					$temp2 = $temp2 - $income3;
					$summIncome2 = $summIncome2 + $income3;
					$array2[$i] = $price3;
				} else if (round($temp2, 3) === $income3) {
					$array2[$i] = $price3;
					$summIncome2 = $summIncome2 + $income3;
					$isTrue2 = false;
				} else if ($temp2 < $income3) {
					$temp2 = $temp2 - $income3;
					$summIncome2 = $summIncome2 + $income3;
					$array2[$i] = $price3;
					$isTrue2 = false;
				}
			}
			$summArray2 = array_sum($array2);

			for ($i = 0; $i < $maxMessages && $isTrue3 == true; $i++) {
				if ($temp3 > $income4) {
					$temp3 = $temp3 - $income4;
					$array3[$i] = $price4;
					$summIncome3 = $summIncome3 + $income4;
				} else if ($temp3 > $income3) {
					$temp3 = $temp3 - $income3;
					$array3[$i] = $price3;
					$summIncome3 = $summIncome3 + $income3;
				} else if ($temp3 > $income2) {
					$temp3 = $temp3 - $income2;
					$array3[$i] = $price2;
					$summIncome3 = $summIncome3 + $income2;
				} else if (round($temp3, 3) === $income2) {
					$array3[$i] = $price2;
					$summIncome3 = $summIncome3 + $income2;
					$isTrue3 = false;
				} else if ($temp3 < $income2) {
					$array3[$i] = $price2;
					$summIncome3 = $summIncome3 + $income2;
					$isTrue3 = false;
				}
			}
			$summArray3 = array_sum($array3);


			for ($i = 0; $i < $maxMessages && $isTrue4 == true; $i++) {
				if ($temp4 > $income4) {
					$temp4 = $temp4 - $income4;
					$array4[$i] = $price4;
					$summIncome4 = $summIncome4 + $income4;
				} else if ($temp4 > $income3) {
					$temp4 = $temp4 - $income3;
					$array4[$i] = $price3;
					$summIncome4 = $summIncome4 + $income3;
				} else if ($temp4 > $income2) {
					$temp4 = $temp4 - $income2;
					$array4[$i] = $price2;
					$summIncome4 = $summIncome4 + $income2;
				} else if ($temp4 > $income1) {
					$temp4 = $temp4 - $income1;
					$array4[$i] = $price1;
					$summIncome4 = $summIncome4 + $income1;
				} else if (round($temp4, 3) === $income1) {
					$array4[$i] = $price1;
					$summIncome4 = $summIncome4 + $income1;
					$isTrue4 = false;
				} else if ($temp4 < $income1) {
					$array4[$i] = $price1;
					$summIncome4 = $summIncome4 + $income1;
					$isTrue4 = false;
				}
			}
			$summArray4 = array_sum($array4);

			if ($summIncome1 >= $requiredIncome) {
				$solution = $array1;
				$tempSum = $summIncome1;
			}

			if ($summIncome2 >= $requiredIncome) {
				if (empty($solution)) {
					$solution = $array2;
					$tempSum = $summIncome2;
				} else {
					print_r($solution);
					if ($tempSum > $summIncome2) {
						$tempSum = $summIncome2;
						$solution = $array2;
					}
				}
			}

			if ($summIncome3 >= $requiredIncome) {
				if (empty($solution)) {
					$solution = $array3;
					$tempSum = $summIncome3;
				} else {
					if ($tempSum > $summIncome3) {
						$tempSum = $summIncome3;
						$solution = $array3;
					}
				}
			}
			if ($summIncome4 >= $requiredIncome) {

				if (empty($solution)) {
					$solution = $array4;
				} else {
					if ($tempSum > $summIncome4) {
						$solution = $array4;
					}
				}
			}
			if (empty($solution)) {
				echo ($summIncome1);
				echo ($requiredIncome);
				$errors[] = 'No one plan is appropriate';
			}
		}
		echo "Sms price: $price1 euro, $price2 euro, $price3 euro, $price4 euro;";
		echo ("<br/>");
		echo "Customer required income: $requiredIncome";
		echo ("<br/>");
		if (isset($data['max_messages'])) {
			echo "Max sms count: $maxMessages";
		}
		if ($requiredIncome > 0 && !isset($maxMessages)) {
			for ($i = 0; $isTrue1 == true; $i++) {
				if ($temp1 > $income4) {
					$temp1 = $temp1 - $income4;
					$array1[$i] = $price4;

				} else if (round($temp1, 3) === $income4) {
					$array1[$i] = $price4;
					$isTrue1 = false;
				} else if ($temp1 < $income4) {
					$array1[$i] = $price4;
					$isTrue1 = false;
				}
			}
			$summArray1 = array_sum($array1);


			for ($i = 0; $isTrue2 === true; $i++) {
				if ($temp2 > $income4) {
					$temp2 = $temp2 - $income4;
					$array2[$i] = $price4;
				} else if ($temp2 > $income3) {
					$temp2 = $temp2 - $income3;
					$array2[$i] = $price3;
				} else if (round($temp2, 3) === $income3) {
					$array2[$i] = $price3;
					$isTrue2 = false;
				} else if ($temp2 < $income3) {
					$temp2 = $temp2 - $income3;
					$array2[$i] = $price3;
					$isTrue2 = false;
				}

			}
			$summArray2 = array_sum($array2);

			for ($i = 0; $isTrue3 === true; $i++) {
				if ($temp3 > $income4) {
					$temp3 = $temp3 - $income4;
					$array3[$i] = $price4;
				} else if ($temp3 > $income3) {
					$temp3 = $temp3 - $income3;
					$array3[$i] = $price3;
				} else if ($temp3 > $income2) {
					$temp3 = $temp3 - $income2;
					$array3[$i] = $price2;
				} else if (round($temp3, 3) === $income2) {
					$array3[$i] = $price2;
					$isTrue3 = false;
				} else if ($temp3 < $income2) {
					$array3[$i] = $price2;
					$isTrue3 = false;
				}
			}
			$summArray3 = array_sum($array3);

			for ($i = 0; $isTrue4 === true; $i++) {
				if ($temp4 > $income4) {
					$temp4 = $temp4 - $income4;
					$array4[$i] = $price4;
				} else if ($temp4 > $income3) {
					$temp4 = $temp4 - $income3;
					$array4[$i] = $price3;
				} else if ($temp4 > $income2) {
					$temp4 = $temp4 - $income2;
					$array4[$i] = $price2;
				} else if ($temp4 > $income1) {
					$temp4 = $temp4 - $income1;
					$array4[$i] = $price1;
				} else if (round($temp4, 3) === $income1) {
					$array4[$i] = $price1;
					$isTrue4 = false;
				} else if ($temp4 < $income1) {
					$array4[$i] = $price1;
					$isTrue4 = false;
				}
			}
			$summArray4 = array_sum($array4);

			if ($summArray1 <= $summArray2 && $summArray1 <= $summArray3 && $summArray1 <= $summArray4) {
				$solution = $array1;
			} else if ($summArray2 <= $summArray3 && $summArray2 <= $summArray4) {
				$solution = $array2;
			} else if ($summArray3 <= $summArray4) {
				$solution = $array3;
			} else {
				$solution = $array4;
			}
		}
		echo ("<br/>");
		echo ("True answer: ");
		if (!empty($errors)) {
			echo implode($errors);
			$solution = $errors;
		} else {
			echo implode(", ", $solution);
		}
		$fp = fopen('result.json', 'w');
		fwrite($fp, json_encode($solution));
		fclose($fp);
	}
}
?>