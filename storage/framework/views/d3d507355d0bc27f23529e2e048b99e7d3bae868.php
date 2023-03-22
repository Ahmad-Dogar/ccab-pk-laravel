<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>



<body>

    <div class="header">

        <h3>

             Mohakhali, Dhaka-1206

        </h3>

        <h5>

            Job Card Report From <?php echo e($data[0][0]); ?> to <?php echo e($data[count($data) - 1][0]); ?>


        </h5>

    </div>

    <div class="eminfo">

        <table style="height: 77px;" width="100%">

            <tbody>

                <tr>

                    <td style="width: 33%;">

                        <div class="eminfodiv">

                            <p>Employee ID :  <?php echo e($employee->employee_id); ?></p>



                            <p> Designation : <?php echo e($employee->designation->designation_name); ?></p>

                            <p>

                                Section : <?php echo e(ucwords($employeeRole->name)); ?>


                            </p>

                        </div>

                    </td>

                    <td style="width: 33%;">&nbsp;</td>

                    <td style="width: 33%;">

                        <div class="eminfodiv">



                            <p> Employee Name : <?php echo e($employee->full_name); ?>


                            </p>

                            <p>Department :  <?php echo e($employee->department->department_name); ?></p>

                            <p>Join Date : <?php echo e($employee->joining_date); ?></p>

                        </div>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

    <div class="table">

        <table style="height: 34px; width: 100%;">

            <tbody>

                <tr>

                    <td style="width: 15%; height: 35px;">Punch Date</td>

                    <td style="width: 15%; height: 35px;">In</td>

                    <td style="width: 15%; height: 35px;">Out</td>

                    <td style="width: 15%; height: 35px;">Status</td>
                      <td style="width: 15%; height: 35px;">Place</td>
                    
                    <td style="width: 10%; height: 35px;">OSD</td>

                    <td style="width: 40%; height: 35px;">Remarks</td>

                </tr>

               <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

               <tr>

                <td style="width: 15%; height: 30px;"><?php echo e($dt[0]); ?></td>

                <td style="width: 15%;  height: 30px;"><?php echo e(isset($dt['clock_in']) ? $dt['clock_in'] : ''); ?></td>

                <td style="width: 15%; height: 30px;"><?php echo e(isset($dt['clock_out']) ? $dt['clock_out'] : ''); ?></td>

                <!--<td style="width: 15%; height: 30px;"><?php echo e(isset($dt['attendance_status']) && $dt['attendance_status'] == 'Absent' ? 'A'  : "P"); ?></td>-->
                
                <?php if(isset($dt['attendance_status'])): ?>
                <td style="width: 15%; height: 30px;">
                <?php if($dt['attendance_status'] == 'Absent'): ?>
                <p>A</p>
                
                <?php elseif($dt['attendance_status'] == 'present'): ?>
               <p>P</p>
                
                <?php elseif($dt['attendance_status'] == 'Late Present'): ?>
               <p>LP</p>
                  <?php elseif($dt['attendance_status'] == 'Late'): ?>
               <p>L</p>
                <?php elseif($dt['attendance_status'] == 'Off Day'): ?>
                <p>H</p>
                
                <?php endif; ?>
                
                </td>
               
                <?php endif; ?>
                <td style="width: 15%; height: 35px;"><?php echo e(isset($dt['place']) ? $dt['place'] : ''); ?></td>
                
                <td style="width: 10%; height: 35px;"><?php echo e(isset($dt['osd']) ? $dt['osd'] : ''); ?></td>

                <td style="width: 15%; height: 30px;"></td>

            </tr>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

    </div>

    <div class="total">

        <table style="height: 77px;" width="100%">

            <tbody>

                <tr>

                    <td>

                        <div class="eminfodiv">

                            <p>Total Present : <?php echo e($totalpresent); ?></p>


                            <p>Total Late Present : <?php echo e($totalLatepresent); ?></p>
                            
                            
                            <!--<p> Total Leave : 0</p>-->



                        </div>

                    </td>
                    

                    <td>

                        <div class="eminfodiv">

                            <p>Total Absent : <?php echo e($totalabsent); ?></p>



                            <p> Total Weekly Holiday : 0</p>



                        </div>

                    </td>

                    <td>

                        <div class="eminfodiv">

                            <p>Total Late : 0</p>



                            <p> Out Station Duty : 0</p>



                        </div>

                    </td>

                    <td>

                        <div class="eminfodiv">

                            <p>Total Holiday : 0</p>



                            <p> Total Overtime : 0</p>



                        </div>

                    </td>
                    
                    
                     <td>

                        <div class="eminfodiv">
                            
                           <p>Total Leave : 0</p>


                            <p>              </p>


                        </div>

                    </td>







                </tr>

            </tbody>

        </table>

    </div>

    <style>

        html,

        body {

            height: 100%;

            width: 100%;

            padding: 0;

            margin: 0;

        }



        .header {

            padding: 10px;

            margin-top: 10px;

            text-align: center;

            border-bottom: 2px solid black;

        }



        .header h3 {

            margin: 10px;

        }



        .header h5 {

            margin: 10px;

        }





        .eminfo {

            padding: 10px;

        }



        .table {

            padding: 10px;

        }



        .total {

            padding: 10px;

        }



        .eminfodiv p {

            margin: 0;

        }



        .table table,

        .table th,

        .table td {

            border: 1px solid black;

            border-collapse: collapse;

            text-align: center;

        }

    </style>

</body>



</html><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/jobcard.blade.php ENDPATH**/ ?>