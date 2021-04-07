def calculateTakeoutCosts(arg):
    total = 0
    for val in arg:
        total += val
    return total

def calculateDeliveryCosts(arg):
    total = 0
    for val in arg:
        total += val #FIXME: why can I not do a counter +=1 in this loop?
    return total + 9 # 3 extra dollars on each val in arg (there are 3 vals in arg)

def calculateDineInCosts(arg):
    total = 0
    for val in arg:
        total += val
    serviceFee = total *.05  # 5 percent service charge on each order, or basically 5 percent on all total dinein
    return total + serviceFee