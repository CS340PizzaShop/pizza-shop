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

totalOrderCount     = 0

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

    #find how many dinein and what type
    if ((row["order_type"] == 'dinein') and (row["topping_type"] == 'cheese')):
        dineinCheeseCount += int(row["quantity"])

    elif ((row["order_type"] == 'dinein') and (row["topping_type"] == 'meat')):
        dineinMeatCount += int(row["quantity"])

    elif ((row["order_type"] == 'dinein') and (row["topping_type"] == 'veggies')):
        dineinVeggieCount += int(row["quantity"])


    #find how many takeout and what type
    if ((row["order_type"] == 'takeout') and (row["topping_type"] == 'cheese')):
        takeoutCheeseCount += int(row["quantity"])

    elif ((row["order_type"] == 'takeout') and (row["topping_type"] == 'meat')):
        takeoutMeatCount += int(row["quantity"])

    elif ((row["order_type"] == 'takeout') and (row["topping_type"] == 'veggies')):
        takeoutVeggieCount += int(row["quantity"])

    
    
    #find total orders
    totalOrderCount = totalDeliveryCount + totalDineinCount + totalTakeoutCount


    #order costs
    cheeseOrderCost = 5
    meatOrderCost = 8
    veggieOrderCost = 8

    #order type costs
    deliveryCost = 3

    dineinPercentage = 0.05
    dineinCost = 0

    takeoutPercentage = 0.15
    takeoutCost = 0

    #total order cost by type
    totalDeliveryCost = 0
    totalDineinCost = 0
    totalTakeoutCost = 0

    #total order cost
    totalOrderCost = 0

    #find cost of delivery orders
    if ((row["order_type"] == 'delivery') and (row["topping_type"] == 'cheese')):
        totalDeliveryCost += deliveryCost + cheeseOrderCost
    
    elif ((row["order_type"] == 'delivery') and (row["topping_type"] == 'meat')):
        totalDeliveryCost += deliveryCost + meatOrderCost

    elif ((row["order_type"] == 'delivery') and (row["topping_type"] == 'veggies')):
        totalDeliveryCost += deliveryCost + veggieOrderCost

    
    #find cost of dinein orders
    if ((row["order_type"] == 'dinein') and (row["topping_type"] == 'cheese')):
        dineinCost = dineinPercentage * cheeseOrderCost
        totalDineinCost += dineinCost + cheeseOrderCost

    elif ((row["order_type"] == 'dinein') and (row["topping_type"] == 'meat')):
        dineinCost = dineinPercentage * meatOrderCost
        totalDineinCost += dineinCost + meatOrderCost

    elif ((row["order_type"] == 'dinein') and (row["topping_type"] == 'veggies')):
        dineinCost = dineinPercentage * veggieOrderCost
        totalDineinCost += dineinCost + veggieOrderCost


    #find cost of takeout orders
    if ((row["order_type"] == 'takeout') and (row["topping_type"] == 'cheese')):
        takeoutCost = takeoutPercentage * cheeseOrderCost
        totalTakeoutCost += takeoutCost + cheeseOrderCost

    elif ((row["order_type"] == 'takeout') and (row["topping_type"] == 'meat')):
        takeoutCost = takeoutPercentage * meatOrderCost
        totalTakeoutCost += takeoutCost + meatOrderCost

    elif ((row["order_type"] == 'takeout') and (row["topping_type"] == 'veggies')):
        takeoutCost = takeoutPercentage * veggieOrderCost
        totalTakeoutCost += takeoutCost + veggieOrderCost

    #find cost of all orders
    totalOrderCost = totalDeliveryCost + totalDineinCost + totalTakeoutCost

    #find total profits
    pizzaProfit = 18
    totalProfit = 0

    totalProfit = (pizzaProfit * totalOrderCount) - totalOrderCost
    


#find out total orders
# simulate takeouts not picked up within 30 min
#calculate profits for delivery,takeout,dinein



# make the orderType pie chart

# make the orderType pie chart
labels = 'Delivery', 'Dine-in', 'Takeout'

deliveryWedge = totalDeliveryCount / totalPizzasSold
dineinWedge = totalDineinCount / totalPizzasSold
takeoutWedge = totalTakeoutCount / totalPizzasSold

sizes = [deliveryWedge, dineinWedge, takeoutWedge]

fig1, ax1 = plt.subplots()
ax1.pie(sizes, labels=labels, autopct='%1.1f%%',
        shadow=True, startangle=90)
ax1.axis('equal')  # Equal aspect ratio ensures that pie is drawn as a circle.
ax1.set_title("Sales between " + str(startDate) + " and " + str(endDate) + " by Order Type")

plt.savefig('C:/xampp/htdocs/Pizza Website/css/images/orderType_pie_chart.png', dpi=100) #saves an updated png pie chart that can then be called via href to show on the php or html page


# make the toppingType pie chart
labels = 'Meat', 'Cheese', 'Veggie'

meatWedge = (deliveryMeatCount + takeoutMeatCount + dineinMeatCount) / totalPizzasSold
cheeseWedge = (deliveryCheeseCount + takeoutCheeseCount + dineinCheeseCount) / totalPizzasSold
veggieWedge = (deliveryVeggieCount + takeoutVeggieCount + dineinVeggieCount) / totalPizzasSold

sizes = [meatWedge, cheeseWedge, veggieWedge]

fig1, ax1 = plt.subplots()
ax1.pie(sizes, labels=labels, autopct='%1.1f%%',
        shadow=True, startangle=90)
ax1.axis('equal')  # Equal aspect ratio ensures that pie is drawn as a circle.
ax1.set_title("Sales between " + str(startDate) + " and " + str(endDate) + " by Topping Type")

plt.savefig('C:/xampp/htdocs/Pizza Website/css/images/toppingType_pie_chart.png', dpi=100) #saves an updated png pie chart that can then be called via href to show on the php or html page


