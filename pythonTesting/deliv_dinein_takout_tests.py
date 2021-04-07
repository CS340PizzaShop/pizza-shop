import unittest

from init import calculateDeliveryCosts 
from init import calculateTakeoutCosts 
from init import calculateDineInCosts  


class TestDeliveryCosts(unittest.TestCase):
    def test_deliveryCosts(self):
        data = [18 + 24 + 32]
        result = calculateDeliveryCosts(data)
        self.assertEqual(result, 83)

class TestDineinCosts(unittest.TestCase):
    def test_deliveryCosts(self):
        data = [18 + 24 + 32]
        result = calculateDineInCosts(data)
        self.assertEqual(result, 77.7)

class TestTakeoutCosts(unittest.TestCase):
    def test_deliveryCosts(self):
        data = [18 + 24 + 32]
        result = calculateTakeoutCosts(data)
        self.assertEqual(result, 74)



if __name__ == '__main__':
    unittest.main()