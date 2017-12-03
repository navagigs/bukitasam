 <table width="100%" border="1">
                                   <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMOR SURAT</th>
                                            <th>PENGISIAN KE</th>
                                            <th>TUJUAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT *  FROM surat_angkut");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $no; ?></td>
                                            <td align="center"><?php echo $row->no_surat_angkut; ?></td>
                                            <td align="center"><?php echo $row->pengisian_ke; ?></td>
                                            <td align="center"><?php echo $row->tujuan; ?></td>
                                         </tr>
                                     <?php $no++; } ?>
                                    </tbody>
                                </table>