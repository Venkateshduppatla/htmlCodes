# program to chane colour photo to black and white photo.


import cv2
import sys
# import otp
fileName = sys.argv[1]

cv2.imwrite("baw.jpg", cv2.cvtColor(cv2.imread(fileName), cv2.COLOR_BGR2GRAY))
cv2.waitKey(0)
cv2.destroyAllWindows()

