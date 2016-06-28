<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mail
 *
 * @author lelenaic
 */
class Mail {

    private $_mail;
    private $_sujet;
    private $_message;

    public function __construct($mail = '', $sujet = '', $message = '') {
        $this->_mail = $mail;
        $this->_message = $message;
        $this->_sujet = $sujet;
    }

    public function creerMail() {
        $corps = '<table align="center" border="0" cellpadding="0" cellspacing="0" id="backgroundTable">
                    <tbody>
                        <tr>
                            <td align="top">
                                <table align="center" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td height="50" width="600">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td height="90" style="color:#999999" width="600"><img height="200px" width="200px" src="'._URL_.'images/logo.png" /></td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="whitesmoke" height="200" style="background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif" valign="top" width="600">
                                                <table align="center" style="margin-left:15px; ">
                                                    <tbody>
                                                        <tr>
                                                            <td height="10" width="560">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="560">
                                                                <h4>' . $this->_sujet . '</h4>
                                                                ' . $this->_message . '
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="10" width="560">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="10" width="600">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="right"><span style="font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif">iControl</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>';
        $this->envoiMail($corps);
    }

    private function envoiMail($message) {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = _MAILHOST_;
        $mail->SMTPAuth = true;
        $mail->Username = _MAILLOGIN_;
        $mail->Password = _MAILPASS_;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = _MAILPORT_;
        $mail->setFrom(_MAIL_, _NOM_);
        $mail->addAddress($this->_mail);     // Add a recipient
        $mail->setLanguage('fr');                                // Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $this->_sujet;
        $mail->isHTML(true);
        $mail->Body = $message;
        $mail->send();
    }
}
