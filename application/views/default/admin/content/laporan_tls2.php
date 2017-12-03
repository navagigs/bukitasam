<table width="100%" border="1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NO.DOK</th>
                                            <th>TANGGAL</th>
                                            <th>JUMLAH TONASE</th>
                                            <th>JENIS BATUBARA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                $dari = $this->input->post('dari');
                                $sampai = $this->input->post('sampai');
                                ?>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT * FROM tls WHERE tanggal between '$dari' and '$sampai' ORDER BY no_dok");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->no_dok; ?></td>
                                            <td><?php echo dateindo1($row->tanggal); ?></td>
                                            <td><?php echo $row->jumlah_tonase; ?></td>
                                            <td><?php echo $row->jenis_batubara; ?></td>
                                         
                                        </tr>
                                     <?php $no++; } ?>
                                      <tr>
                                    <td colspan="6">Dari tanggal <b><?php echo dateIndo($dari); ?></b> sampai tanggal <b><?php echo dateIndo($sampai); ?></b>
                                </tr>
                            </tbody>
                        </table>
                                    </tbody>
                                </table>