# Analog clock angle calculator

Clock problems are one of the frequently asked questions in most of the competitive exam under Logical Reasoning. To solve these problems, it is always better to understand some of the basic principles and the types of problems that get asked. 

In this case we examine the **minimum angle** formed between the hour hand and the minute hand.

## Basics Of Clocks

An analog clock is a circle and the basic principle starts with the fact that there are 360 degrees of angular measurement in a circle.

Next, we had to determine the measure in degrees between the increment of 1 hour. Since there are 12 hours on a standard clock face we divided the total 360-degree measurement by 12 to get 30. 360/12=30. This tells us that the space between any 2 hours is 30 degrees.

<p align="center">
  <img src="/images/clock1.gif" raw=true width="205" height="188" />
</p>

As the minute hand takes a complete round in one hour it covers 360° in 60 min.
In 1 minute it covers 360/60 = 6°/ minute.

<p align="center">
  <img src="/images/clock2.gif" raw=true width="371" height="294" />
</p>

## Facts About Clocks

* It doesn't matter whether we are talking about 1 am or 1 pm, the answer is exactly the same for both
* Every hour, both the hands coincide once. But in 12 hours, they will coincide 11 times and this happens due to only one such incident between 12 and 1’o clock
* The hands are in the same straight line when they are coincident or opposite to each other
* When the two hands are at a right angle, they are 15-minute spaces apart. In one hour, they will form two right angles and in 12 hours there are only 22 right angles. It happens due to right angles formed by the minute and hour hand at 3’o clock and 9’o clock
* When the hands are in opposite directions, they are 30-minute spaces apart
* If both the hour hand and minute hand move at their normal speeds, then both the hands meet after 65(5/11) minutes

## Input parameters

| Parameter | Type     | Format   | Description                                                                                    |
| :-------- | :------- | :------- | :--------------------------------------------------------------------------------------------- |
| `time`    | `string` | `H:i:s`  | **Optional**. If the time parameter is not entered, the current system time is used by default |

### example

```http
  localhost/?time=02:30:59
```

## Equation for the angle between the hands

The angle between the hands can be found using the following formula:

<p align="center">
  <img src="/images/formula1.png" raw=true width="673" height="180" />
</p>

where

* H is the hour
* M is the minute

If the angle is greater than 180 degrees then subtract it from 360 degrees.

### Example 1

The time is 2:20.

<p align="center">
  <img src="/images/example1.png" raw=true width="480" height="218" />
  <img src="/images/answer2.png" raw=true width="218" height="218" />
</p>

### Example 2

The time is 10:16.

<p align="center">
  <img src="/images/example2.png" raw=true width="505" height="218" />
  <img src="/images/answer2.png" raw=true width="218" height="218" />
</p>
