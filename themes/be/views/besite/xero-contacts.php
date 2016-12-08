<?php

$contact = new XeContact();
 
						//add org details first
						$contact->contactNumber = 145241;
						$contact->name = 'Sample';
						$contact->taxNumber = 453685;
						 
						//add address
						$address = new XeAddress();
						$address->addressType = XeAddress::AT_POBOX; //billing address
						$address->addressLine1 = 'Test 1';
						$address->addressLine1 = 'Test 2';
						$address->addressLine2 = 'Test 3';;
						$address->city = 'Mytown';
						$address->region = 'Tamil Nadu';
						$address->postalCode = '600087';
						 
						$contact->addresses->add($address);
						$contact->firstName = 'Dharma';
						$contact->lastName = 'Raj';
						$contact->emailAddress = 'dharma.t.raj@gmail.com';
						 
						$contact->save();
?>