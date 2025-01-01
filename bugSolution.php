<?php
function calculateTotal(array $items): float {
  $total = 0.0;
  foreach ($items as $item) {
    if (is_numeric($item['price'])) {
      $total += floatval($item['price']);
    } else {
      // Handle non-numeric price appropriately. Throw an exception or use a default value
      throw new InvalidArgumentException('Price must be a number.');
    }
  }
  return $total;
}

$items = [
  ['name' => 'Item 1', 'price' => 10],
  ['name' => 'Item 2', 'price' => '20abc'],
  ['name' => 'Item 3', 'price' => 30]
];

try {
  $total = calculateTotal($items);
  echo "Total: " . $total;
} catch (InvalidArgumentException $e) {
  echo "Error: " . $e->getMessage();
}
?>
