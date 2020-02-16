<html>
    
    <head>

        <meta charset="utf-8">
      
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        <title>{{ $data['from_name'] }}</title>

        <style>


            #outlook a {
                padding:0;
            }

            body {
                width:100% !important; 
                background-color:#41849a; 
                margin:0 !important; 
                padding:0 !important;

            }  
            .ReadMsgBody {
                width:100%;
            } 
            .ExternalClass {
                width:100%;
            }

            ol li {
                margin-bottom:15px;
            }
        
            img {
                height:auto; 
                line-height:100%; 
                outline:none; 
                text-decoration:none;
            }

            #backgroundTable {
                height:100% !important; 
                margin:0; 
                padding:0; 
                width:100% !important;
            }
        
            p {
                margin: 1em 0;
            }
        
            h1, h2, h3, h4, h5, h6 {
                color:#222222 !important; 
                font-family:Arial, Helvetica, sans-serif; 
                line-height: 100% !important;
            }
        
            table td {
                border-collapse:collapse;
            }
        
            .yshortcuts, .yshortcuts a, .yshortcuts a:link,.yshortcuts a:visited, .yshortcuts a:hover, .yshortcuts a span { 
                color: black; 
                text-decoration: none !important; 
                border-bottom: none !important; 
                background: none !important;
            }
        
            .im {
                color:black;
            }

            div[id="tablewrap"] {
                width:100%; 
                max-width:600px!important;
            }

            table[class="fulltable"], td[class="fulltd"] {
                max-width:100% !important;
                width:100% !important;
                height:auto !important;
            }
                
            @media screen and (max-device-width: 430px), screen and (max-width: 430px) { 
                td[class=emailcolsplit] {
                    width:100%!important; 
                    float:left!important;
                    padding-left:0!important;
                    max-width:430px !important;
                }
                td[class=emailcolsplit] img {
                    margin-bottom:20px !important;
                }
            }

        </style>

    </head>

    <body style="width:100% !important; margin:0 !important; padding:0 !important; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; background-color:#FFFFFF;">

        <table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="height:auto !important; margin:0; padding:0; width:100% !important; background-color:#FFFFFF; color:#222222;">
            
            <tr>
                
                <td>
         
                    <div id="tablewrap" style="width:100% !important; max-width:600px !important; text-align:center !important; margin-top:0 !important; margin-right: auto !important; margin-bottom:0 !important; margin-left: auto !important;">

                        <table id="contenttable" width="600" align="center" cellpadding="0" cellspacing="0" border="0" style="background-color:#FFFFFF; text-align:center !important; margin-top:0 !important; margin-right: auto !important; margin-bottom:0 !important; margin-left: auto !important; border:none; width: 100% !important; max-width:600px !important;">
                            
                            <tr>
                                
                                <td width="100%">
                    
                                    <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" width="100%">
                        
                                        <tr>
                                        
                                            <td width="100%" bgcolor="#ffffff" style="text-align:center;">

                                                <a href="#">

                                                    <img src="{{ asset('public/assets/uploads/'.$data['logo']) }}" alt="MyBarber" style="display:inline-block; max-width:100% !important; width:100% !important; height:auto !important;border-bottom-right-radius:8px;border-bottom-left-radius:8px;" border="0">
                                                </a>
                                        
                                            </td>
                                    
                                        </tr>
                                
                                    </table>

                                    <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="25" width="100%">
                        
                                        <tr>
                                            
                                            <td width="100%" bgcolor="#ffffff" style="text-align:left;">
                                
                                                <p style="color:#222222; font-family:Arial, Helvetica, sans-serif; font-size:15px; line-height:19px; margin-top:0; margin-bottom:20px; padding:0; font-weight:normal;">
                                            
                                                    Dear {{ $data['rsv_name'] }},       
                                
                                                </p>
                                
                                                <p style="color:#222222; font-family:Arial, Helvetica, sans-serif; font-size:15px; line-height:19px; margin-top:0; margin-bottom:20px; padding:0; font-weight:normal;">

                                                    {!! $data['rsv_msg_content'] !!}<br/></br>Your Informations :

                                                </p>
                                                
                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" class="emailwrapto100pc">
                                                
                                                    <tr>
                                                        
                                                        <td class="emailcolsplit" align="left" valign="top" width="100%">
                                                        
                                                            <p style="color:#222222; font-family:Arial, Helvetica, sans-serif; font-size:15px; line-height:19px; margin-top:0; margin-bottom:20px; padding:0; font-weight:normal;">

                                                                Reservation Code : {{ $data['rsv_code'] }}<br/>
                                                                Treatment : {{ $data['treat_name'] }}<br/>
                                                                Price : @rupiah($data['treat_price'])<br/>
                                                                Date : {{ date('d F Y', strtotime($data['rsv_date'])) }}<br/>
                                                                Time : {{ date('h:i a', strtotime($data['rsv_time'])) }}<br/>
                                                                Status : <b>{{ $data['rsv_status'] }}</b><br/>

                                                            </p>
                                                        
                                                        </td>

                                                    </tr>
                                      
                                                </table>
    
                                            </td>
                                        
                                        </tr>
                                
                                    </table>

                                    <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="25" width="100%">
                                        
                                        <tr>
                            
                                            <td width="100%" bgcolor="#ffffff" style="text-align:left;">
                                                
                                                <p style="color:#222222; font-family:Arial, Helvetica, sans-serif; font-size:11px; line-height:14px; margin-top:0; margin-bottom:15px; padding:0; font-weight:normal;">

                                                    {!! $data['rsv_msg_footer'] !!}

                                                </p>

                                            </td>
                                        
                                        </tr>
                                    
                                    </table>
                                
                                </td>
                            
                            </tr>
                        
                        </table>
                    
                    </div>
                
                </td>
            
            </tr>
        
        </table> 

    </body>

</html>