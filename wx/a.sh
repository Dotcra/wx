#!/bin/bash
#

############### Variables ###############

############### Functions ###############

############### Main Part ###############

curl -v -X POST "https://speech.platform.bing.com/recognize?scenarios=smd&appid=D4D52672-91D7-4C74-8AD8-42B1D98141A5&locale=zh-TW&device.os=Windows7&version=3.0&format=json&instanceid=b2c95ede-97eb-4c88-81e4-80f32d6aee54&requestid=b2c95ede-97eb-4c88-81e4-80f32d6aee54" -H "Authorization: Bearer $a" -H 'Content-type: audio/mp3; codec="audio/pcm"; samplerate=16000' --data-binary @isay.mp3
