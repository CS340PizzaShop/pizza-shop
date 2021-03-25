import sys
import json
import numpy as np
from matplotlib import pyplot as plt

after_json = sys.argv[1]
employee_pay = sys.argv[2]
startDate = sys.argv[3]
endDate = sys.argv[4]

jsonObject = json.loads(after_json) # this takes json string and turn it into python argument
jsonStr = json.dumps(jsonObject)  # takes in a json object and returns a string


#Formatting the JSON String into an array ---

#remove the first and last "
if jsonStr.startswith('"') and jsonStr.endswith('"'):
    jsonStr = jsonStr[1:-1]

#remove the first and last []
if jsonStr.startswith('[') and jsonStr.endswith(']'):
    jsonStr = jsonStr[1:-1]

#remove the \ escape chars
jsonStr = jsonStr.replace("\\", "")

# make a python array with all of the JSON data for easier manipulation, splitting at every },
jsonArr = jsonStr.split('},')


# replace the } that was lost in the split (necessary to make a valid JSON string)
for i in range(len(jsonArr)-1):     # its length -1 because the last } was not removed in the split bc it was not followed by a ,
    jsonArr[i] = jsonArr[i] + "}"


    #PROCESS THE DARN DATA ---

totalDeliveryCount  = 0
totalDineinCount    = 0
totalTakeoutCount   = 0

totalCheeseCount    = 0
totalMeatCount      = 0
totalVeggieCount    = 0

#  specifically for delivery
deliveryCheeseCount = 0
deliveryMeatCount   = 0
deliveryVeggieCount = 0

#  specifically for dinein
dineinCheeseCount   = 0
dineinMeatCount     = 0
dineinVeggieCount   = 0

#  specifically for takeout
takeoutCheeseCount  = 0
takeoutMeatCount    = 0
takeoutVeggieCount  = 0

for i in range(len(jsonArr)):
    row = json.loads(jsonArr[i])            #take the JSON string (jsonArr[i]) and turn it into an object, so you can call for the individual fields in it
    
    #find how many of each total order type there were
    if (row["order_type"] == 'delivery'):
        totalDeliveryCount += int(row["quantity"])

    elif (row["order_type"] == 'dinein'):
        totalDineinCount += int(row["quantity"])

    elif (row["order_type"] == 'takeout'):
        totalTakeoutCount += int(row["quantity"])

    #find how many of each total pizza there were
    if (row["topping_type"] == 'cheese'):
        totalCheeseCount += int(row["quantity"])

    elif (row["topping_type"] == 'meat'):
        totalMeatCount += int(row["quantity"])

    elif (row["topping_type"] == 'veggies'):
        totalVeggieCount += int(row["quantity"])


    #find how many delivery and what type
    if ((row["order_type"] == 'delivery') and (row["topping_type"] == 'cheese')):
        deliveryCheeseCount += int(row["quantity"])

    elif ((row["order_type"] == 'delivery') and (row["topping_type"] == 'meat')):
        deliveryMeatCount += int(row["quantity"])

    elif ((row["order_type"] == 'delivery') and (row["topping_type"] == 'veggies')):
        deliveryVeggieCount += int(row["quantity"])

    
    #find how many takeout and what type
    if ((row["order_type"] == 'takeout') and (row["topping_type"] == 'cheese')):
        takeoutCheeseCount += int(row["quantity"])

    elif ((row["order_type"] == 'takeout') and (row["topping_type"] == 'meat')):
        takeoutMeatCount += int(row["quantity"])

    elif ((row["order_type"] == 'takeout') and (row["topping_type"] == 'veggies')):
        takeoutVeggieCount += int(row["quantity"])

    
    #find how many dinein and what type
    if ((row["order_type"] == 'dinein') and (row["topping_type"] == 'cheese')):
        dineinCheeseCount += int(row["quantity"])

    elif ((row["order_type"] == 'dinein') and (row["topping_type"] == 'meat')):
        dineinMeatCount += int(row["quantity"])

    elif ((row["order_type"] == 'dinein') and (row["topping_type"] == 'veggies')):
        dineinVeggieCount += int(row["quantity"])



#find out total orders
# simulate takeouts not picked up within 30 min
#calculate profits for delivery,takeout,dinein



# make the orderType pie chart
# make the toppingType pie chart
